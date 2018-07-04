<h2>level 2</h2>

Tool for getting pull requests from Bitbucket repositories.

Type public repository's author and name, with a slash between them, following way: "andrewpeterson/neural".<br>
Authorize with your username, password and OAuth consumer key and secret. Then you will be redirected to another page with your API access token, so that you can access your private repository's pull requests.

The whole application is written in php, laravel framework.
Build and run application Docker container with the following command:
```
docker build -t zen .
docker run -p 8000:80 --rm zen
```

Please enable pop-ups in your browser, so that app will be able to open new windows.
