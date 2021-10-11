<!DOCTYPE html>
<html>
<head>
    <title>Add Items</title>
    <link rel="stylesheet" type="text/css" href="../frontend/css/forms.css">
</head>
<body>
<form action="items" method="POST">
    @csrf 
    <h1>ADD ITEMS</h1>
    <input type="text" name="item_name" placeholder="Enter Item Name" >
    <input type="text" className="form-control"  name="wash_type" list="wash_type" placeholder="Enter Washing Type">
                <datalist id="wash_type">
                <option value="Normal Wash"/>
                    <option value="Dry Wash"/>
                    
                    
                </datalist>
    <input type="number" name="unit_price" placeholder="Enter Unit Price" >
    <button type="submit">Add Item</button>
</form>
</body>