import sys
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import re
import json
import mysql.connector

# Database connection details
connection = mysql.connector.connect(
    user='root',
    password='',
    host='localhost',
    database='caredge',
    port = '3307'
)

cursor = connection.cursor()

# Fetch the selected skills from the user_selection table
query_user_id = "SELECT id FROM user_selections ORDER BY id DESC LIMIT 1"
cursor.execute(query_user_id)
result = cursor.fetchone()
recent_user_id = result[0] if result else None

if not recent_user_id:
    print(json.dumps([]))
    sys.exit()

query_skills = f"SELECT skills FROM user_selections WHERE id = {recent_user_id}"
cursor.execute(query_skills)
skills_result = cursor.fetchone()
selected_skills = skills_result[0] if skills_result else ""

if not selected_skills:
    print(json.dumps([]))
    sys.exit()

# Function to preprocess text (remove punctuation and convert to lowercase)
def preprocess_text(text):
    text = re.sub(r'[^\w\s]', ' ', text)  # Remove punctuation and replace with space
    text = re.sub(r'\s+', ' ', text)  # Replace multiple spaces with a single space
    text = text.strip()  # Strip leading and trailing spaces
    text = text.lower()  # Convert to lowercase
    return text

# Preprocess the selected skills
selected_skills = preprocess_text(selected_skills)

# Read the CSV file
df = pd.read_csv('/Users/raystores/Downloads/Caredge/jobs.csv')  # Update the path as per your file location

# Preprocess the required skills in your data
df['skills_required'] = df['skills_required'].apply(preprocess_text)

# Append the selected skills as an additional entry
combined_data = df['skills_required'].tolist() + [selected_skills]

# Convert Text to Vectors using TF-IDF
tfidf = TfidfVectorizer(stop_words='english')
tfidf_matrix = tfidf.fit_transform(combined_data)

# Compute Cosine Similarity Matrix
cosine_sim = cosine_similarity(tfidf_matrix, tfidf_matrix)

# Get the similarity scores for the selected skills
selected_skills_index = len(combined_data) - 1
sim_scores = list(enumerate(cosine_sim[selected_skills_index]))

# Sort the jobs based on the similarity scores
sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)

# Remove the similarity score with itself (the last entry)
sim_scores = sim_scores[1:]

# Get the indices of the top similar jobs
job_indices = [i[0] for i in sim_scores]

# Ensure job_indices are within the bounds of the DataFrame
job_indices = [i for i in job_indices if i < len(df)]

# Retrieve the top recommended jobs and their similarity scores
recommended_jobs = df.iloc[job_indices]
recommended_jobs_with_scores = [(recommended_jobs.iloc[i]['Job_title'], recommended_jobs.iloc[i]['skills_required'], format(sim_scores[i][1] * 100, '.2f'), recommended_jobs.iloc[i]['company']) for i in range(len(recommended_jobs))]

# Prepare and print the top 10 recommendations along with their similarity scores and skills
results = []

for job_title, job_skills, sim_score, company in recommended_jobs_with_scores[:10]:
    result = {
        'job_title': job_title,
        'job_skills': job_skills,
        'sim_score': sim_score,
        'company' : company
    }
    results.append(result)

output = {
    'id': recent_user_id,
    'recommendations': results
}

print(json.dumps(output))

cursor.close()
connection.close()
