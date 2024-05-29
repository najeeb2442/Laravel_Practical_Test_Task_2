<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
</head>
<body>
    <div>
        <h1>Customer who spent more money on orders</h1>
        <h3>{{$highestSpentMoney->customerName}}</h3>
    </div>
    <br><br>
    <div>
        <h1>Customer who has the highest number of orders</h1>
        <h3>{{$highestNumberOfOrders->customerName}}</h3>
    </div>
</body>
</html>
