<?php
    include 'connect.php';
    $sql_cate = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql_cate);

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $file_name = '';

        if(isset($_FILES['image']['name'])){
            $file = $_FILES['image'];
            $file_name = $file['name'];
            $tmp = $file['tmp_name'];

            move_uploaded_file($tmp, './uploads/'.$file_name);
        }

        $sql = "INSERT INTO product (name, image, price, status, description, category_id) VALUES ('$name', '$file_name', '$price', $status, '$description', $category_id)";
        echo $sql;
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
          } else {
            echo "Error deleting record: " . $conn->error;
          }
          
          $conn->close();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
      <h1 class="text-center">THÊM MỚI SẢN PHẨM</h1>
        
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" id="" class="form-control" placeholder="Name..">
        </div>

        <div class="form-group">
          <label for="">Image</label>
          <input type="file" name="image" id="" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Price</label>
          <input type="text" name="price" id="" class="form-control" placeholder="Price..">
        </div>

        <div class="form-group">
          <label for="">Status</label>
          <input type="text" name="status" id="" class="form-control" placeholder="Status..">
        </div>

        <div class="form-group">
          <label for="">Desciption</label>
          <input type="text" name="description" id="" class="form-control" placeholder="Desciption..">
        </div>

        <div class="form-group">
          <label for="">Category</label>
          <select class="form-control" name="category_id" id="">
              <?php foreach($result as $cat) :?>
                  <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>

                <?php endforeach;?>

          </select>
        </div>
        <button name="submit" type="submit" id="" class="btn btn-primary" href="#">SUBMIT</button>
      </form>
      </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>