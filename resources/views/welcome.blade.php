<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
      <img src="gomo.jpg" class="img-rounded" alt="Gomo Learning"> 
  <h2>Product feedback</h2>
  <p>At gomo,we are continually workingto enhance our product suiteand welcome all customer feedback to help us prioritise and improve the features and functionality available with the gmo solution</p>                                                                                      
  <div class="table-responsive">          
         <?php $feedback=[
            '1'=>'Feature Request',
            '2'=>'General Feedback',
            '3'=>'Bug'
        ];
       ?>
      
        {!! BootForm::open(['store' => 'FeedbackController@store','method'=>'post','route'=>'feedback','url'=>'feedback']); !!} 
        {!! BootForm::label('Product Feedback'); !!}
        {!! BootForm::text('first_name','First Name*'); !!}
        {!! BootForm::text('last_name','Last name*'); !!}
        {!! BootForm::email('email','Email address*'); !!}
        {!! BootForm::text('telephone','Telephone number'); !!}
        {!! BootForm::radios('feedback_nature','Nature of Feedback*',$feedback,'Feature Request'); !!}
        {!! BootForm::textarea('details','Details*','Please provide the as much information as possible in relation to the feedbackyou are submitting.');!!}
        {!! BootForm::submit('Submit');!!}
      
        {!!  BootForm::close(); !!}
  </div>
</div>

</body>
</html>

       




      
     