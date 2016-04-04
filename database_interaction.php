<?php
try {

 $conn = new MongoClient('simpleeditor.com');

 $db = $conn->admin;
 
 
 $collection = $db->users;
 
 $cursor = $collection->find();
 
 
 echo $cursor->count() . ' document(s) found. <br/>'; 
 
 foreach ($cursor as $obj) {
  echo 'username: ' . $obj['username'] . '<br/>';
  echo 'e-mail: ' . $obj['email'] . '<br/>';
  echo 'password: ' . $obj['password'] . '<br/>';
  $notes = $obj["notes"];
  foreach ($notes as $obj) {
  	echo 'title: ' . $obj['name'] . '<br/>';
  	echo 'date modified: ' . $obj['datem'] . '<br/>';
  	echo ' ' . $obj['text'] . '<br/>';
  }
  echo '<br/>';
 }
 
 $conn->close();
}
 catch (MongoConnectionException $e) {
 die('Error connecting to MongoDB server');
} catch (MongoException $e) {
 die('Error: ' . $e->getMessage());
}
/*db.users.insert({"username":"admin", "email":"admin@admin.com", "password":"password", notes:[{"name": "note1", "datem": "12:03:2016", "text" : "Hello1"}, {"name": "note2", "datem": "13:03:2016", "text" : "Hello2"}]}) */
/*db.users.insert({"username":"user1", "email":"user1@user1.com", "password":"password1", notes:[{"name": "note1", "datem": "14:03:2016", "text" : "Hello_user1_1"}, {"name": "note2", "datem": "13:06:2016", "text" : "Hello_user1_2"}]}) */
?>
