<?php 


Flight::route("GET /students", function(){
    Flight::json(Flight::student_service()->get_all());
 });
//ni slucajno zab ove zagrade kod student_service or student_dao()
//ovdje umjesto da bude student_dao()->get_all(), bit ce student_service()->get_all(), a u services cemo pozvati student_dao();



Flight::route("GET /students/@id", function($id){
    //$student_dao = new StudentDao(); 
    //$results = $student_dao->get_by_id($id);
    ////print_r($results);
    //Flight::json($results); //-> converts the results to the JSON form
    Flight::json(Flight::student_service()->get_by_id($id));
    //Kad smo iskoristili register, onda je ovo sad laksi nacin pisanja koda jer zovemo odmah direktno preko aliasa i manje je linija koda
    //ne zaboraviti, ako funkcije primaju parametre, da se onda ti parametri i unesu
});

Flight::route("GET /student_by_id", function(){
    //ovo je preko querija, a ne body
    //$id = Flight::request()->query['id']);
    //Flight::json(Flight::student_dao()->get_by_id($id);
    Flight::json(Flight::student_service()->get_by_id(Flight::request()->query['id']));
});

/*Razlika izmedu students/@id i student_by_id jeste da u drugoj mi u linku moramo unijeti ?id=x jer smo je radili preko querija i onda je tako i pozivamo, dok u prvoj dok
unosimo link samo stavimo broj za id i odmah dobijemo ispis, rezultat je ispit, medutim postupak je isti.Query metoda ne prima argumente, dok ova prva prima
Jos jedna razlika je da kad radimo preko querija onda se treba napraviti i request za query, tj. da s etrazi od usera da se unese kao sto je to ovdje uradeno
Flight::request()->query['id']), dok kada radimo preko data onda je dovoljno da napisemo Flight::request()->data->getData();*/

Flight::route("GET /students/name/@name", function($name){ //ovo @name je path 
    echo "Hello from / students route with name = " .$name;
});

Flight::route("GET /students/@name/@status", function($name, $status){ //ovo @name je path 
    echo "Hello from / students route with name = " .$name. " and status = " .$status;
});

//Rute mogu imati koliko god zelimo parametara


Flight::route("DELETE /students/@id", function($id){
    //$student_dao = new StudentDao();
    Flight::student_service()->delete($id);
    //delete does not return anything so we can keep it as it is
    Flight::json(['message' => "Student deleted successfully."]); //-> converts the results to the JSON form
});


Flight::route("POST /student", function(){
    //$student_dao = new StudentDao(); o
    $request = Flight::request()->data->getData();
    
    //$student_dao->add($request['first_name'], $request['last_name']);
    //ovdje se poziva funkcija add iz StudentDao i to je unnecessary coding pa da se to izbjegne posalje se samo request array
    //$response = $student_dao->add($request); 
    //u response se spasava return value od ove funkcije add
    //print_r($results); obrisano kad smo dodali register na vrhu
    
    Flight::json(['message' => 'Student added succesfully', 'data' => Flight::student_service()->add($request)]); //-> converts the results to the JSON form
    //U JSON mozemo odmah direktno spasiti i pozvati vrijednosti, ili sacuvati iznad u neku varijablu i onda nju pozvati u JSON
});

//najcesce se sve radi preko ID, jer je to jedino unique za svakoga
Flight::route("PUT /student/@id", function($id){
    
    //$student_dao = new StudentDao();
    $student = Flight::request()->data->getData();

    //$response= $student_dao->update($student, $id);
    Flight::json(['message' => 'Student edit succesfully', 'data' => Flight::student_service()->update($student, $id)]); //-> converts the results to the JSON form

    //ovaj array smo mogli iznad kreirati, i spasiti u neku varijablu i onda nju pozvati, ili ovako odmah direktno array
});

?>