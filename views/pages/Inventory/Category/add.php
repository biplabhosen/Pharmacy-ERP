<h2>Add category</h2>
<form action="<?= $base_url?>/category/save" method="POST">
   
  <div class="mb-3">
    <label for="name" class="form-label">Category Name</label>
    <input  type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="create" value="" class="btn btn-primary">Submit</button>
</form>