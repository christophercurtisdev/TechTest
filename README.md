## ConnexOne Tech Test
The structure of this backend is as follows. A microservice model is created. Rule models are then created to satisfy
the criteria of the correct payload hitting that microservice. The payload itself is stored as a model for each key value
pair in the JSON. Sub-objects inside the payload are defined by 'outerkey:innerkey' in the table. The frontend implementation
would be ideally in Vue.js with Laravel API serving the data to this. A number of service classes have also been created
in order to keep the controllers clean and manipulate the data prior to hitting them.<br><br>The rule table is defined by
the key, the value, and whether or not that pair is whitelisted or blacklisted for the given microservice. This is to allow
easy updates to rules and if need be, more microservices.<br><br>The payload is decoded and then stored to allow easier
manipulation of the data (decoding and reconstructing in the service class to got to and from array to JSON object). This is
as opposed to storing as a JSON blob - either would be functional, however querying each rule is possible with 1 query this way
rather than decoding on the fly and looping everytime when data was retreived.<br><br>I decided to omit the front-end because of
the time restraint as well as some functionality and the priority was showing the direction that the backend logic would take.<br>
<br>Thank you for your consideration - I look forward to hearing from you.
