<h1>ADD ITEMS</h1>
<form action="items" method="POST">
    @csrf 
    <input type="text" name="item_name" placeholder="Enter Item Name" ><br><br>
    <input type="text" className="form-control"  name="wash_type" list="wash_type" placeholder="Enter Washing Type">
                <datalist id="wash_type">
                <option value="Normal Wash"/>
                    <option value="Dry Wash"/>
                    
                    
                </datalist><br><br>
    <input type="number" name="unit_price" placeholder="Enter Unit Price" ><br><br>
    <button type="submit">Add Item</button>
    
</form>