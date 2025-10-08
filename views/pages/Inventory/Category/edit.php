<h2>Update Category</h2>
<form action="<?=$base_url?>/category/update" method="POST">
   
  <div class="mb-3">
    <label for="id" class="form-label">Category id</label>
    <input  type="text" name="id" value="<?=$category->id?>" class="form-control" id="id" aria-describedby="emailHelp">
    <label for="name" class="form-label">Category Name</label>
    <input  type="text" name="name" value="<?=$category->name?>" class="form-control" id="name" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
</form>
