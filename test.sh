

curl -X POST http://localhost/api/generate-result -H "Content-Type: application/json" --data-binary @- <<DATA
{
  "type": "chat",
 "model":"gpt-3.5-turbo",
"messages":[
        {"role": "system", "content": "You are a helpful assistant."},
        {"role": "user", "content": "Generate a press release for music artist Mastashake"}
       
]
}
DATA
