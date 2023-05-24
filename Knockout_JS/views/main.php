<script src="https://ajax.aspnetcdn.com/ajax/knockout/knockout-3.5.0.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<select name="selectnhanvien" id="selectnhanvien" data-bind="options: listnv,
                       optionsText: 'nvName',
                       value: selectedNhanvien">

</select><br><br>

<div>
    <span data-bind="text: selectedNhanvien().nvName "></span>,
    <span data-bind="text: selectedNhanvien().nvAge "></span> tuổi,
    <span data-bind="text: selectedNhanvien().nvJob "></span>
</div>
<br><br>

<span><button data-bind="click: changeState">Add User</button> <a data-bind="attr: { href: 'index.php?act=del&id=' + selectedNhanvien().id }"><button>Delete</button></a></span>
<form method="post" action="index.php?act=add" data-bind="visible: state">
    <div>
        <label for="name">Tên:</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="age">Tuổi:</label>
        <input type="number" name="age">
    </div>
    <div>
        <label for="job">Nghề nghiệp:</label>
        <input type="text" name="job">
    </div>
    <button type="submit" name="addemployee">ADD</button>
</form>
<script type="text/javascript">
    var NhanVien = function(id, name, age, job) {
        this.id = id;
        this.nvName = name;
        this.nvAge = age;
        this.nvJob = job;
    };

    function viewModel() {
        var self = this;
        state = ko.observable(true);

        self.changeState = function() {
            self.state =  true;
        };

        self.listnv = ko.observableArray([]);
        self.selectedNhanvien = ko.observable();
        var employeesData = JSON.parse('<?php echo json_encode($list_nv2) ?>');
        employeesData.forEach(function(employeeData) {
            var employee = new NhanVien(employeeData.id, employeeData.name, employeeData.age, employeeData.job);
            self.listnv.push(employee);
        });
    }
    ko.applyBindings(new viewModel());
</script>