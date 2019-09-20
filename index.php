<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Future internet agency</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="navbar">
                <div class="navbar__contacts">
                    <span class="phone">Телефон: <a href="tel:+74993409471">(499) 340-94-71</a></span>
                    <span class="email">Email: <a href="mailto:info@future-group.ru">info@future-group.ru</a></span>
                </div>
                <div class="navbar__comments">
                    <span>Комментарии</span>
                </div>
                <div class="navbar__logo">
                    <img src="img/logo.png" alt="" class="logo">
                </div>
            </div>
            <div class="comments">
                <div class="comments__block">
                <?php require 'db.php';
                    $comments = get_all_comments();
                    foreach($comments as $comment){

                    ?>
                    <div class="comments__info">
                        <span class="comments__name"><?php echo $comment['name']; ?></span>
                        <div class="data">
                            <span class="comments__clock" style="margin-right: 10px;"><?php echo date("H:i", strtotime($comment['data'])); ?></span>
                            <span class="comments__date"><?php echo date("d.m.Y", strtotime($comment['data'])); ?></span>
                        </div>
                        
                    </div>
                    <div class="comments__text">
                        <span><?php echo $comment['comment']; ?></span>
                    </div>
                    <?php } ?>
                </div>
                <hr>
                <div class="comments_create">
                    <span class="comments__write">Оставить комментарий</span>
                    <form action="" method="POST">
                        <div class="comments__form_container">
                            <label for="">Ваше имя</label>
                            <input class="name_input" type="text" placeholder="Герасим" name="name">
                            <label for="">Ваш комментарий</label>
                            <textarea name="text" id="" cols="30" rows="10"></textarea>
                            <input class="submit-btn" type="submit" value="Отправить" name="submit">
                        </div>
                        
                    </form>
                    <?php
                    ob_start();
                    if(isset($_POST['submit'])){
                        create_comment($_POST['name'], $_POST['text']);
                        header("Location: /index.php");
                    }
                    ?>
                </div>
            </div>
            <div class="footer">
                <div class="footer__logo">
                    <img src="img/logo.png" alt="" class="footer__logo_img">
                </div>
                <div class="footer__contacts">
                    <span class="phone">Телефон: <a href="tel:+74993409471">(499) 340-94-71</a></span><br>
                    <span class="email">Email: <a href="mailto:info@future-group.ru">info@future-group.ru</a></span><br>
                    <span class="address">Адрес: 115088 Москва, ул. 2-я Машиностроения, д. 7 стр. 1</span><br>
                    <span class="copyrite">&copy; 2010 - 2014 Future. Все права защищены</span>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>