<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-07
 * Time: 오후 3:15
 */

class commonController
{
    public $contextPath;
    public $uploadDir;
    public function commonContoller(){
        $this->contextPath =  $_SERVER['DOCUMENT_ROOT'];
    }
    public function pageNavigation($controller){
        $page = floor($controller->currPage / $controller->pageSize) * $controller->pageSize +1;
        if($controller->currPage > $controller->pageSize)
            echo "<a href='#' onclick='movePage(".($page-10).");'>이전</a>";

        $i = $page;
        if(floor($controller->totalRow / $controller->pageSize) < $controller->countPage){
            $controller->countPage = floor($controller->totalRow / $controller->pageSize)+1;
        }
        while($i<=$controller->countPage){
            echo "<a href='#' onclick=movePage(".$i.");>".$i."</a>";
            $i=$i+1;
        }
        $controller->countPage=10;
        if($controller->currPage > $controller->totalRow-floor($controller->totalRow / $controller->countPage))
            echo "<a href='#' onclick='movePage(".($page+10).");'>다음</a>";

    }
    public function fileUpload(){
        // 설정
        $uploads_dir = 'c:\\DIR';
        //$allowed_ext = array('jpg','jpeg','png','gif');

        // 변수 정리
        $error = $_FILES['file']['error'];
        $name = $_FILES['file']['name'];
        //$ext = array_pop(explode('.', $name));

        // 오류 확인
        if( $error != UPLOAD_ERR_OK ) {
            switch( $error ) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo "파일이 너무 큽니다. ($error)";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    return;
                    //echo "파일이 첨부되지 않았습니다. ($error)";
                    break;
                default:
                    echo "파일이 제대로 업로드되지 않았습니다. ($error)";
            }
            exit;
        }

        // 확장자 확인
        /*if( !in_array($ext, $allowed_ext) ) {
            echo "허용되지 않는 확장자입니다.";
            exit;
        }*/

        // 파일 이동
        move_uploaded_file( $_FILES['file']['tmp_name'], "$uploads_dir/$name");

        // 파일 정보 출력
        //echo "<script>alert('#파일명: ".$name." #확장자:  #파일형식: {".$_FILES['file']['type']."} #파일크기: {".$_FILES['file']['size']."} 바이트');</script>";
        return $name;
    }
}

?>