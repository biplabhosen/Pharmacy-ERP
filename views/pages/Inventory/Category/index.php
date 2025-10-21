<h3>All Categories</h3>
<button class="btn-success p-2 mb-3 border-0 rounded-2">
  
  <a href="<?=$base_url?>/category/add" class="btn-success p-2 rounded-2">Add Category</a>
  </button>
<table class="table ">
  <thead class="bg-success">
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  
     <?php
        foreach ($category as $value) {
           echo "
           
             <tr>
                <th >$value->id</th>
                <th >$value->name</th>
                <th >$value->created_at</th>
                <th >$value->updated_at</th>
                <th class=''>
                 <a class='btn btn-info' href='$base_url/category/edit/$value->id'>Eidt</a>
                 <a class='btn btn-danger' href='$base_url/category/delete/$value->id'>Delete</a>
                
                </th>
                
            </tr>
           
           
           
           ";
        }
     ?>
  </tbody>
</table>

