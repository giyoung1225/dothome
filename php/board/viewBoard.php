<?php
    include '../connect/connect.php';
    include '../connect/session.php';
    include '../connect/checkSession.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="webstoryboy">
    <meta name="description" content="웹스토리보이 포트폴리오 사이트입니다.">
    <meta name="keywords" content="웹표준, 웹접근성, 사이트만들기, 포트폴리오">
    <title>Portfolio</title>
    
    <!-- CSS Style -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- webfonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
</head>
<body>
   <!-- skip  -->
   <div id="skip">
       <a href="#mainCont">게시글 작성하기</a>
   </div>
   <!-- //skip  -->
   
    <!-- header  -->
    <header id="header">
        <div class="site"><a href="site.html">site</a></div>
<div class="logo"><a href="../main/index.html">hong</a></div>
<nav class="nav">
    <ul>
                        <li><a href="../sign/signUp.php">회원가입</a></li>
                <li><a href="../sign/logIn.php">로그인</a></li>
                        <li><a href="../board/board.php">게시판</a></li>
    </ul>
    <ul>
        <li><a href="about.html">About</a></li>
        <li><a href="reference.html">Reference</a></li>
        <li><a href="script.html">Script</a></li>
        <li><a href="animation.html">Animation</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</nav>    </header>
    <!-- //header  -->
    
    <main>
        <!-- boardCont -->
        <section id="boardCont">
            <div class="container">
                <div class="listBoard">
                    <h2>게시판입니다.</h2>

                    <!-- //listSearch -->
                    <div class="listTable">
                        <table class="table">
                            <colgroup>
                                <col style="width: 20%">
                                <col style="width: 80%">
                            </colgroup>
                            <tbody>

                                <?php
                                    if(isset($_GET['boardID']) && (int) $_GET['boardID'] > 0){
                                        $boardID =$_GET['boardID'];

                                        $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID) "; 
                                        $sql .= "WHERE b.boardID = {$boardID}";

                                        $result = $dbConnect -> query($sql);

                                        if($result){
                                            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                            echo "<tr><th>제목</th><td class='left'>".$memberInfo['boardTitle']."</td></tr>";
                                            echo "<tr><th>등록자</th><td class='left'>".$memberInfo['youNickName']."</td></tr>";
                                            echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $memberInfo['regTime'])."</td></tr>";
                                            echo "<tr class='contents'><th>내용</th><td class='left'>".$memberInfo['boardContent']."</td></tr>";
                                        }
                                    }
                                
                                
                                ?>





                                <!-- <tr>
                                    <th>제목</th>
                                    <td>aaa</td>
                                </tr>
                                <tr>
                                    <th>등록자</th>
                                    <td>aaa</td>
                                </tr>
                                <tr>
                                    <th>등록일</th>
                                    <td>aaa</td>
                                </tr>
                                <tr>
                                    <th>내용</th>
                                    <td>aaa</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="listSearch">
                        <a class="form-btn black mt20" href="board.php">목록 보기</a>
                    </div>
                    <!-- //listTable -->

                </div>
            </div>
        </section>
        <!-- //boardCont -->
    </main>

</body>
</html>