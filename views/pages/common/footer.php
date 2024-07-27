<style>
    .truncate-multiline {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
        -webkit-line-clamp: 1;
        line-clamp: 1;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<footer>
    <div class="footer-grey mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xl-6 mt-5">
                    <div class="foot-1 d-flex">
                        <img class="mr-4 d-none d-md-block" src="img/ico_email_subscribe.svg" alt="">
                        <div class="foot-text m-auto">
                            <h3>
                                Get Updates & More</h3>
                            <h5>Thoughtful thoughts to your inbox</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 mt-5">
                    <input type="text" placeholder="Your Email">
                    <a href="#">Subscribe</a>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-end mb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-3">
                    <h6 id="outline" class=" mt-5 pb-3">NEED HELP?</h6>
                    <div class="tel mb-4 mt-5">
                        <h6>Call us</h6>
                        <h4><?php echo $config[0]['hotline'] ?></h4>
                    </div>
                    <div class="email mb-4 ">
                        <h6>Email for</h6>
                        <h4><?php echo $config[0]['email'] ?>
                        </h4>
                    </div>
                    <div class="social mb-4">
                        <h6>Follow us</h6>
                        <div class="items-foot">
                            <a href="<?php echo $config[0]['facebook_link'] ?>"><i class="fab fa-facebook-f "></i></a>
                            <a href="<?php echo $config[0]['instagram_link'] ?>"> <i class="fab fa-instagram "></i></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 mt-5">

                </div>
                <div class="col-sm-12 col-lg-3 mt-5">
                    <h6 id="outline" class=" pb-3">Danh sách bài viết</h6>
                    <ul class="p-0 m-0">
                        <?php if (!empty($posts)) : ?>
                            <?php foreach ($posts as $post) : ?>
                                <li class="truncate-multiline"><a href="/views/pages/post/index.php/?post_id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
        </div>
        <hr>
        <div class="container">
            <span>Copyright © 2020 by</span>
            <a href="#">Traveler Theme</a>
        </div>
    </div>

</footer>