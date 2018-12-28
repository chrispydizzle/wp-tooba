<?php


function sc_headerbanner($atts, $content = null)
{
    $a = shortcode_atts(array(
        'number' => 0,
        'text' => ''
    ), $atts);

    return "
<div>
	<div class='pad30 green_buffer'>
		<h3 style='text-align: center; text-transform: uppercase;'>
		<span style='font-size: 80px; padding: 0 10px; font-family: 'Poppins',sans-serif; top: 1vh; position: relative;'>"
        . $a['number'] .
        '</span>' .
        $a['text'] . '</h3>
		</div>
</div>';
}

function sc_about($atts, $content = null)
{
    $a = shortcode_atts(array(
        'title' => 'About Us',
        'text' => 'something about us',
        'image' => 'wp-content/themes/tooba/images/temp/story.jpg',
        'anchor' => 'about',
    ), $atts);

    return '<div class="row" data-anchor="' . $a['anchor'] . '" >
                    <div class="col about" style="">
                    	<div class="stretchto leftstretch" target="aboutus" style="background-image: url(' . $a['image'] . ')"></div>
                    	<div id="aboutus" class="col-md-6">
	                        <div class="section-title left">
	                            <h3>' . $a['title'] . '</h3>
	                        </div>
	                        <p>' . $a['text'] . '</p>
						</div>   						                                                                 
                    </div>                       
                </div>';
}

function sc_counter()
{
    return '<div class="row green_buffer">
                            <div class="col counter">
                                <div class="animated-counter text-center white">
                                    <div class="animated-number" data-from="0" data-to="125">12</div>
                                    <h4>Completed<br> Projects</h4>
                                </div>
                            </div>
                            <div class="col counter">
                                <div class="animated-counter text-center white">
                                    <div class="animated-number" data-from="0" data-to="5786">150</div>
                                    <h4>Pieces<br> Ordered</h4>
                                </div>
                            </div>
                            <div class="col counter">
                                <div class="animated-counter text-center white">
                                    <div class="animated-number" data-from="0" data-to="355">55</div>
                                    <h4>Happy<br> Clients</h4>
                                </div>
                            </div>
                        </div>';
}

function sc_team($atts, $content = null)
{
    $a = shortcode_atts(array(
        'title' => 'Our Products',
        'anchor' => 'ourteam'
    ), $atts);
    return '<section class="pad-t80 pad-b50" data-anchor="' . $a['anchor'] . '">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="section-title text-center">
                            <h3>Team Member</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="team-member-3">
                            <div class="team-member-img">
                                <img class="img-responsive" src="assets/images/team/team2.jpg" alt="">
                            </div>
                            <div class="team-info">
                                <span class="team-name">Jon Snow</span>
                                <span class="team-designation">CEO</span>
                            </div>
                            <div class="social-icon">
                                <ul class="icon">
                                    <li>
                                        <a href="index.html#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="index.html#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="index.html#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="team-member-3">
                            <div class="team-member-img">
                                <img class="img-responsive" src="assets/images/team/team3.jpg" alt="">
                            </div>
                            <div class="team-info">
                                <span class="team-name">Jon Snow</span>
                                <span class="team-designation">CEO</span>
                            </div>
                            <div class="social-icon">
                                <ul class="icon">
                                    <li>
                                        <a href="index.html#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="index.html#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="index.html#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="team-member-3">
                            <div class="team-member-img">
                                <img class="img-responsive" src="assets/images/team/team5.jpg" alt="">
                            </div>
                            <div class="team-info">
                                <span class="team-name">Jon Snow</span>
                                <span class="team-designation">CEO</span>
                            </div>
                            <div class="social-icon">
                                <ul class="icon">
                                    <li>
                                        <a href="index.html#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="index.html#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="index.html#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                </div>
            </div>
        </section>';
}

function sc_contact($atts, $content = null)
{
    $a = shortcode_atts(array(
        'title' => 'Contact Us',
        'image' => 'wp-content/themes/tooba/images/temp/contact.jpg',
        'anchor' => 'contactus'
    ), $atts);
    return '<div class="row col col" style="padding-right: 40px;" data-anchor="' . $a['anchor'] . '"> 
				<div class="col-md-6 contact" id="contactus">
                        <div class="section-title left">
                            <h3 class="col-md-12">' . $a['title'] . '</h3>
                        </div>
                        <form id="quotation" class="quotation-form">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input name="name" class="form-control" id="name" type="text" placeholder="Your Name" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input name="email" class="form-control" id="email" type="text" placeholder="E-mail" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input name="phone" class="form-control" id="phone" type="text" placeholder="Your Phone" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input name="address" class="form-control" id="address" type="text" placeholder="Your Address" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select name="category" class="form-control" id="category" required="required">
                                            <option value="" selected="selected">Category</option>
                                            <option value="Apartment">Apartment</option>
                                            <option value="Office">Office</option>
                                            <option value="Kitchen">Kitchen</option>
                                            <option value="Bathroom">Bathroom</option>
                                            <option value="Drawing Room">Drawing Room</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select name="room-no" class="form-control" id="room-no" required="required">
                                            <option value="" selected="selected">Room No</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" placeholder="Your Message" required="required" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                	<div>&nbsp;</div>
                                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                                </div>
                            </div>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                        </form>                        
                </div>
                <div class="stretchto rightstretch" target="contactus" style="background-image: url(' . $a['image'] . ')"></div>
                </div>';
}

function sc_news($atts, $content = null)
{
    $a = shortcode_atts(array(
        'title' => 'Latest News',
        'anchor' => 'inthenews'
    ), $atts);
    return '<section class="pad-t80 pad-b50" data-anchor="' . $a['anchor'] . '">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3>' . $a['title'] . '</h3>
                        </div>
                    </div>
                </div>
                <div class="row owl-scroll">
                    <div class="col-md-8">
                        <div class="latest-news">
                            <div class="latest-news-img">
                                <img src="assets/images/blog/latest-blog-1.jpg" class="img-responsive" alt="blog-post">
                                <div><span>JUNE</span><span>29</span></div>
                            </div>
                            <div class="comment">
                                <p>Posted In: <span>Business, Blog</span></p>
                                <p><span><a href="index.html#"><i class="fa fa-comments"></i></a> 15</span>
                                   <span><a href="index.html#"><i class="fa fa-eye"></i></a> 11</span></p>
                            </div>
                            <h4><a href="index.html#">Lorem Ipsum is dummy text of type setting industry.</a></h4>
                            <p>Vivamus magna justo, lacinia eget consectetur convallis at tellus. Lorem ipsum dolor sit consectetur adipiscing elit</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
}

function sc_testimonials($atts, $content = null)
{
    $a = shortcode_atts(array(
        'title' => 'What Our Customers Are Saying',
        'anchor' => 'ourcustomers'
    ), $atts);
    return '<section class="pad80 parallax" style="background-image: url(assets/images/bg/interior-bg-2.jpg);" data-anchor="' . $a['anchor'] . '">
            <div class="container">
                <div class="row">
                    <div class="section-title text-center white">
                        <h3>' . $a['title'] . '</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide testimonial-slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
                                    <img class="img-responsive" src="assets/images/testimonials/1.jpg" alt="">
                                </li>
                                <li data-target="#carousel-example-generic" data-slide-to="1">
                                    <img class="img-responsive" src="assets/images/testimonials/2.jpg" alt="">
                                </li>
                                <li data-target="#carousel-example-generic" data-slide-to="2">
                                    <img class="img-responsive" src="assets/images/testimonials/3.jpg" alt="">
                                </li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner white" role="listbox">
                                <div class="item active">
                                    <div class="testimonial-speech">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur..</p>
                                    </div>
                                    <span>- Saifullah Sammo</span>
                                </div>
                                <div class="item">
                                    <div class="testimonial-speech">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur..</p>
                                    </div>
                                    <span>- Saifullah Sammo</span>
                                </div>
                                <div class="item">
                                    <div class="testimonial-speech">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur..</p>
                                    </div>
                                    <span>- Saifullah Sammo</span>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="fa fa-long-arrow-left" aria-hidden="true"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
}

function sc_footer($atts, $content = null)
{
    $a = shortcode_atts(array(
        'title' => 'Our Products'
    ), $atts);
    return '<section class="footer-section pad-t80 pad-b30 parallax" style="background-image: url(assets/images/bg/footer-bg.jpg); background-position: 50% 20%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>                
                    <div class="col-md-4">
                        <div class="footer-title">
                            <h3>About Us</h3>
                        </div>
                        <div class="footer-text">
                            <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. <span class="text-brand-color">Vivamus magna justo</span>, lacinia eget consectetur sed, convallis at tellus. Nulla porttitor accumsan tincidunt.</p>
                            <p>Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci <span class="text-brand-color">luctus et</span> ultrices posuere cubilia Curae.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-title">
                            <h3>Office Hour</h3>
                        </div>
                        <div class="footer-office-hour">
                            <ul>
                                <li><a href="index.html#">Opining Days :</a></li>
                                <li><a href="index.html#">Monday – Friday : 9am to 20 pm</a></li>
                                <li><a href="index.html#">Saturday : 9am to 17 pm</a></li>
                            </ul>
                            <ul>
                                <li><a href="index.html#">Vacations :</a></li>
                                <li><a href="index.html#">All Sunday Days</a></li>
                                <li><a href="index.html#">All Official Holidays</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="footer-title">
                            <h3>Service List</h3>
                        </div>
                        <div class="footer-list">
                            <ul>
                                <li><a href="index.html#"><i class="fa fa-long-arrow-right"></i>Interior Design</a></li>
                                <li><a href="index.html#"><i class="fa fa-long-arrow-right"></i>Architecture</a></li>
                                <li><a href="index.html#"><i class="fa fa-long-arrow-right"></i>Bedroom Design</a></li>
                                <li><a href="index.html#"><i class="fa fa-long-arrow-right"></i>Bathroom Interior</a></li>
                                <li><a href="index.html#"><i class="fa fa-long-arrow-right"></i>Living Room</a></li>
                                <li><a href="index.html#"><i class="fa fa-long-arrow-right"></i>Kitchen Interior</a></li>
                            </ul>
                        </div>                        
                    </div>
                    <div class="col-md-3">
                        <div class="footer-title">
                            <h3>Subscribe</h3>
                        </div>
                        <p>Vivamus magna justo, lacinia eget consectetur sed.</p>
                        <form>
                            <div class="form-group footer-subscribe">
                                <input type="email" class="form-control" id="Email1" placeholder="Subscribe with us">
                                <button type="submit" class="btn btn-default">Join</button>
                            </div>
                        </form>
                        <div class="social-top">
                            <ul class="top-social">
                                <li><a href="index.html#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="index.html#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="index.html#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="index.html#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="index.html#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="index.html#" target="_blank"><i class="fa fa-rss"></i></a></li>
                            </ul>                            
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
					<div class="col-md-12">&nbsp;</div>
					<div class="col-md-12">&nbsp;</div>					                                        
                </div>
            </div>
        </section>';
}