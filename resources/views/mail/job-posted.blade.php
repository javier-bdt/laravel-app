<p>Job Title: {{ $job->title }}</p>
<p>Congratulations! Your job has been posted successfully.</p>
<p>Job Salary: {{ $job->salary }}</p>
<p>Employer: {{ $job->employer->name }}</p>
<p>User: {{ $job->employer->user->first_name }}</p>
<p>Job Created At: {{ $job->created_at }}</p>
<p>Job Updated At: {{ $job->updated_at }}</p>
<p>Job URL: <a href="{{ url('/jobs/' . $job->id) }}">View the job</a></p>
