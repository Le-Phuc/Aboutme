<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/CheckUserUtil.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<script>
    document.title = 'Add News | VinaEnter Edu';   
</script>
<div class="content-wrapper">
 <!-- Main content -->
    <section class="content">
        <div class="main">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                       <div class="col-md-12" style="color: red;">
                            <h2>Thêm tin tức</h2>
                       </div> 
                    </div>
                    <hr/>
                    <div class="row">
                    	<div class="col-md-12">
								<?php
									if(isset($_POST['submit']))
									{
										$name = $_POST['name'];
										$cat_id = $_POST['cat_id'];
										$created_at = $_POST['created_at'];
										$hide_show = $_POST['hide_show'];
										$picture = $_FILES['picture']['name'];
										$preview_text = $_POST['preview_text'];
										$detail_text = $_POST['detail_text'];
										if($picture == '')
										{
											//thêm truyện không hình
											$queryNoPic = "INSERT INTO news(name,cat_id,created_at,hide_show,preview_text,detail_text)
														   VALUES ('{$name}','{$cat_id}','{$created_at}','{$hide_show}','{$preview_text}','{$detail_text}')";
											$resultNoPic = $mysqli->query($queryNoPic);
											if($resultNoPic)
											{
												header("location:index.php?msg=Thêm thành công");
											}else
											{
												echo "Có lỗi khi thêm tin tức không hình";
											}
										}else
										{
											//thêm truyện có hình
											//upload hình
											$tmp = explode('.', $picture);
											$duoiFile = end($tmp);
											$tenFileMoi = 'LĐP-'.time().'.'.$duoiFile;
											$tmp_name = $_FILES['picture']['tmp_name'];
											$path_upload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$tenFileMoi;
											move_uploaded_file($tmp_name, $path_upload);
											$queryPic = "INSERT INTO news(name,cat_id,created_at,hide_show,preview_text,detail_text,picture)
														   VALUES ('{$name}','{$cat_id}','{$created_at}','{$hide_show}','{$preview_text}','{$detail_text}','{$tenFileMoi}')";
											$resultPic = $mysqli->query($queryPic);
											if($resultPic)
											{
												header("location:index.php?msg=Thêm thành công");
											}else
											{
												echo "Có lỗi khi thêm tin tức có hình";
											}
										}
									}
								?>
								<form action="" method="POST" enctype="multipart/form-data" role="form" class="addnews">
                                    <div class="form-group">
                                        <label>Tên tin tức</label>
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục truyện</label>
                                        <select name="cat_id" class="form-control">
											<?php
												$query = "SELECT * FROM cat";
												$ketqua = $mysqli->query($query);
												while($arCat = mysqli_fetch_assoc($ketqua))
												{
											?>
                                                <option value="<?php echo $arCat['cat_id'];?>"><?php echo $arCat['name'];?></option>
                                            <?php
												}
											?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày đăng</label>
                                        <input type="text" name="created_at" class="form-control" placeholder="yyyy-mm-dd" />
                                    </div>
                                   	<div class="form-group">
                                        <label>Trạng thái</label>
                                        <input type="text" name="hide_show" class="form-control" placeholder="ẩn(0)-hiện(1)" />
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="picture" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea id="mota-addnews" class="form-control" rows="3" name="preview_text"></textarea>
                                    	<script type="text/javascript">
                                    		 CKEDITOR.replace( 'mota-addnews',
											 {
											     filebrowserBrowseUrl: '/library/ckfinder/ckfinder.html',
											     filebrowserImageBrowseUrl: '/library/ckfinder/ckfinder.html?type=Images',
											     filebrowserUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
											     filebrowserImageUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
											 });
                                    	</script>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea id="chitiet-addnews" class="form-control" rows="5" name="detail_text"></textarea>
                                    	<script type="text/javascript">
                                    		CKEDITOR.replace( 'chitiet-addnews',
											{
											    filebrowserBrowseUrl: '/library/ckfinder/ckfinder.html',
											    filebrowserImageBrowseUrl: '/library/ckfinder/ckfinder.html?type=Images',
												filebrowserUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
											    filebrowserImageUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
											});
                                    	</script>
                                    </div>


                                    <input type="submit" class="btn btn-primary" name="submit" value="Thêm"></input>
                                </form>
                                    <script type="text/javascript">
									$(document).ready(function(){
										$('.addnews').validate({
											rules:{
												name:{
													required: true,
												},
												cat_id:{
													required: true,
												},
												created_at:{
													required: true,
												},
												hide_show:{
													required: true,
												},
												preview_text:{
													required: true,
												},
												detail_text:{
													required: true,
												},
											
											},
											messages:{
												name:{
													required: "vui long nhap ten tin tuc",
												},
												cat_id:{
													required: "vui long chon danh muc tin",
												},
												created_at:{
													required: "vui long nhap ngay dang",
												},
												cat_id:{
													required: "vui long nhap trang thai",
												},
												preview_text:{
													required: "vui long nhap mo ta",
												},
												detail_text:{
													required: "vui long nhap chi tiet",
												},
												
											},	
										});
									});
									</script>
                              
							<style>
								.error{color:red;}
							</style>

                            </div>
                    </div>

        </div>
    </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- /. PAGE WRAPPER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>