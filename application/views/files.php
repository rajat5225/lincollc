<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>

    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>

        <div class="app-portal">
            <div class="portal-body py-5">
                <div class="container">
                    <div class="text-right">
                        <div class="d-flex">
                            <ul class="create-menu d-flex mr-3">
                                <li>
                                    <button class="create-folder">Folder</button>                                    
                                </li>
                                <li>
                                    <button class="create-file">File</button>
                                </li>
                            </ul>
                            <button class="btn create">Create new</button>
                        </div>
                    </div>
                    <div class="custom-drive">
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview folder p-2">
                                    <img src="./assets/images/icons/folder.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview folder p-2">
                                    <img src="./assets/images/icons/folder.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview folder p-2">
                                    <img src="./assets/images/icons/folder.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview folder p-2">
                                    <img src="./assets/images/icons/folder.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview folder p-2">
                                    <img src="./assets/images/icons/folder.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview folder p-2">
                                    <img src="./assets/images/icons/folder.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview file p-2">
                                    <img src="./assets/images/icons/document.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview file p-2">
                                    <img src="./assets/images/icons/document.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview file p-2">
                                    <img src="./assets/images/icons/document.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                        <div class="drive-box">
                            <div class="box">
                                <div class="preview file p-2">
                                    <img src="./assets/images/icons/document.png" alt="" class="p-5">
                                </div>
                                <p class="fileName text-center">Training</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


              <?php $this->load->view('common/footer'); ?>

    </div>
<div class="create-popper folder">
        <p>Create Folder</p>
        <div class="d-flex">
            <input type="text" class="form-control" placeholder="Folder Name">
            <button type="submit" class="btn">Create</button>
        </div>
    </div>

    <div class="create-popper file">
        <p>Create File</p>
        <div class="d-flex">
            <input type="text" class="form-control" placeholder="Folder Name">
            <button type="submit" class="btn">Create</button>
        </div>
    </div>	
<?php $this->load->view('common/end'); ?>
</body>
</html>