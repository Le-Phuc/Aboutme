<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/CheckUserUtil.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<script>
    document.title = 'Edit News | VinaEnter Edu';   
</script>
<div class="content-wrapper">
 <!-- Main content -->
    <section class="content">
        <div class="main">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                       <div class="col-md-12" style="color: red;">
                            <h2>Sửa tin tức</h2>
                       </div> 
                    </div>
                    <hr/>
                    <div class="row">
                    	<div class="col-md-12">
								<?php
									$news_id = $_GET['id'];
									$query2 = "SELECT * FROM news WHERE news_id = {$news_id}";
									$ketqua2 = $mysqli->query($query2);
									$arNew = mysqli_fetch_assoc($ketqua2);
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
											//không thay đổi hình
											$queryNoPic = "UPDATE news	
														   SET name ='{$name}',
														   cat_id ='{$cat_id}',
														   created_at ='{$created_at}',
														   hide_show ='{$hide_show}',
														   preview_text ='{$preview_text}',
														   detail_text ='{$detail_text}'
														   WHERE news_id = {$news_id}";
											$resultNoPic = $mysqli->query($queryNoPic);
											if($resultNoPic)
											{
												header("location:index.php?msg=Sửa thành công");
											}else
											{
												echo "Có lỗi khi sửa tin tức không thay đổi hình";
											}
										}else
										{
											//có thay đổi hình
											//kiểm tra hình cũ
											if($arNew['picture'] != '')
											{
												unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$arNew['picture']);
											}
											//upload hình mới
											$tmp = explode('.', $picture);
											$duoiFile = end($tmp);
											$tenFileMoi = 'LĐP-'.time().'.'.$duoiFile;
											$tmp_name = $_FILES['picture']['tmp_name'];
											$path_upload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$tenFileMoi;
											move_uploaded_file($tmp_name, $path_upload);
											$queryPic = "UPDATE news	
														   SET name ='{$name}',
														   cat_id ='{$cat_id}',
														   created_at ='{$created_at}',
														   hide_show ='{$hide_show}',
														   preview_text ='{$preview_text}',
														   detail_text ='{$detail_text}',
														   picture ='{$tenFileMoi}'
														   WHERE news_id = {$news_id}";
											$resultPic = $mysqli->query($queryPic);
											if($resultPic)
											{
												header("location:index.php?msg=Sửa thành công");
											}else
											{
												echo "Có lỗi khi sửa tin tức có thay đổi hình";
											}
										}
									}
								?>
								<form action="" method="POST" enctype="multipart/form-data" role="form" class="editnews">
                                    <div class="form-group">
                                        <label>Tên tin tức</label>
                                        <input type="text" name="name" value="<?php echo $arNew['name'];?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục truyện</label>
                                        <select name="cat_id" class="form-control">
											<?php
												$query = "SELECT * FROM cat";
												$ketqua = $mysqli->query($query);
												while($arCat = mysqli_fetch_assoc($ketqua))
												{
													$selected = '';
													if($arCat['cat_id'] == $arNew['cat_id'])
													{
														$selected = 'selected';
													}
											?>
                                                <option <?php echo $selected;?> value="<?php echo $arCat['cat_id'];?>"><?php echo $arCat['name'];?></option>
                                            <?php
												}
											?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày đăng</label>
                                        <input type="text" name="created_at" value="<?php echo $arNew['created_at'];?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái (ẩn:0 - hiên: 1)</label>
                                        <input type="text" name="hide_show" value="<?php echo $arNew['hide_show'];?>" class="form-control" />
                                    </div>
									<?php
										if($arNew['picture'] != '')
										{
									?>
                                    <div class="form-group">
                                        <label>Hình ảnh cũ</label>
                                        <img src="/files/<?php echo $arNew['picture'];?>" width="100px"/>
                                    </div>
									<?php
										}
									?>
									<div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="picture" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea id="mota-editnews" class="form-control" rows="3" name="preview_text"><?php echo $arNew['preview_text'];?></textarea>
                                    	<script type="text/javascript">
                                    		CKEDITOR.replace( 'mota-editnews',
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
                                        <textarea id="chitiet-editnews" class="form-control" rows="5" name="detail_text"><?php echo $arNew['detail_text'];?></textarea>
                                    	<script type="text/javascript">
                                    		CKEDITOR.replace( 'chitiet-editnews',
											{
											    filebrowserBrowseUrl: '/library/ckfinder/ckfinder.html',
											    filebrowserImageBrowseUrl: '/library/ckfinder/ckfinder.html?type=Images',
											    filebrowserUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
											    filebrowserImageUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
											});
                                    	</script>                                        
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
                                </form>

                                <script type="text/javascript">
									$(document).ready(function(){
										$('.editnews').validate({
											rules:{
												name:{
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
												created_at:{
													required: "vui long nhap ngay dang",
												},
												hide_show:{
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
