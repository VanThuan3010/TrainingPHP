<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
  <script>
    // JavaScript for deleting
    $(document).on('click', '#delete-object', function() {

      var id = $(this).attr('delete-id');

      bootbox.confirm({
        message: "<h4>Are you sure?</h4>",
        buttons: {
          confirm: {
            label: '<span class="glyphicon glyphicon-ok"></span> Yes',
            className: 'btn-danger'
          },
          cancel: {
            label: '<span class="glyphicon glyphicon-remove"></span> No',
            className: 'btn-primary'
          }
        },
        callback: function(result) {

          if (result == true) {
            $.post('delete_product.php', {
              object_id: id
            }, function(data) {
              location.reload();
            }).fail(function() {
              alert('Unable to delete.');
            });
          }
        }
      });

      return false;
    });
  </script>
</body>

</html>