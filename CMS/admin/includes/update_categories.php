
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Edit Category</label>

                                <?php 
                                if (isset($_GET['edit'])) {
                                    
                                $edit_cat_id = escape($_GET['edit']);

                                $query = "SELECT * FROM categories WHERE cat_id = $edit_cat_id ";
                                $edit_categories_id = mysqli_query($con,$query);

                                while ($row = mysqli_fetch_assoc($edit_categories_id)) {
                                $cat_id = escape($row['cat_id']);
                                $cat_title = escape($row['cat_title']);
                                ?>
                                <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" 
                                type="text" class="form-control" name="cat_title">

                         <?php  }}  ?>
                         <?php 
                                //UPDATE CATEGORY QUERY
                                if (isset($_POST['update_category'])) {
                                $update_cat_title = escape($_POST['cat_title']);
                                $query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = {$cat_id} ";
                                $update_query = mysqli_query($con,$query);
                                if (!$update_query) {
                                    
                                    die("QUERY FAILED".mysqli_error($con));
                                }else {
                                    ?>
                                    <script>
                                        alert("Category update Successfully");
                                        window.top.location = "categories.php";
                                    </script>
                                	<!-- echo 'Update Successfully'; -->
                                    <?php
                                }
                            }

                         ?>     
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="update_category" 
                                value="Update Category">
                            </div>
                        </form>