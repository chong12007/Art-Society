<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>About Us</title>
        
        <link href="css/about_us.css" rel="stylesheet" type="text/css"/>
        <link href="css/header.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="images/icon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    </head>
    <body>

<?php

include './heading.php';

?>

 <section class="about">
            <div class="main">
                <img src="images/flower.jpg">
                <div class="text">
                    <h1>About Us</h1>
                    <h5><span>Artistic</span> Art Society</h5>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem pariatur exercitationem quis placeat magnam, perferendis a excepturi amet error tempore eligendi quod animi laboriosam commodi porro qui fuga sunt aperiam?
                    </p>
                    <button type="button">Login</button>
                </div>
            </div>
        </section>
        
        <section class="our_team">
            <h1>Our Team</h1>
            <div class="team">
                <div class="member">
                    <div class="picture">
                        <img src="images/huimun.jpg" alt="member_image">
                    </div>
                    <h3>Hui Mun</h3>
                    <p class="role">
                        chairman
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut debitis amet sunt voluptatum nesciunt dolores voluptates, quod qui, culpa molestiae minus porro odio possimus laudantium soluta molestias consequatur, quaerat dicta?
                    </p>
                    
                </div>
            </div>

            <div class="team">
                <div class="member">
                    <div class="picture">
                        <img src="images/lichui.jpg" alt="member_image">
                    </div>
                    <h3>Li Chui</h3>
                    <p class="role">
                        vice-chairman
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut debitis amet sunt voluptatum nesciunt dolores voluptates, quod qui, culpa molestiae minus porro odio possimus laudantium soluta molestias consequatur, quaerat dicta?
                    </p>
                </div>
            </div>

            <div class="team">
                <div class="member">
                    <div class="picture">
                        <img src="images/jianhau.jpg" alt="member_image">
                    </div>
                    <h3>Jian Hau</h3>
                    <p class="role">
                        treasurer
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut debitis amet sunt voluptatum nesciunt dolores voluptates, quod qui, culpa molestiae minus porro odio possimus laudantium soluta molestias consequatur, quaerat dicta?
                    </p>
                </div>
            </div>

            <div class="team">
                <div class="member">
                    <div class="picture">
                        <img src="images/hungfei.jpg" alt="member_image">
                    </div>
                    <h3>Hung Fei</h3>
                    <p class="role">
                        secretary
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut debitis amet sunt voluptatum nesciunt dolores voluptates, quod qui, culpa molestiae minus porro odio possimus laudantium soluta molestias consequatur, quaerat dicta?
                    </p>
                </div>
            </div>
        </section>

        <section class="top">
            <a href="#top">
                <img src="images/top.png">
            </a>
        </section>

<?php
include './footer.php';

?>