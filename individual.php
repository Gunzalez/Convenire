<?php
$thumbnails = 1;
if(isset($_GET["thumbnails"])){
    $temp = intval($_GET["thumbnails"]);
    if( $temp > 1){
        $thumbnails = $temp;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Convenire</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/convenire.css" rel="stylesheet">

    <!-- include jQuery.mmenu .css files -->
    <link type="text/css" href="js/vendors/mmenu/jquery.mmenu.all.css" rel="stylesheet" />
    <link type="text/css" href="js/vendors/fancybox/jquery.fancybox.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div>
    <div class="heading">
        <h1 class="logo"><a href="index.html">Convenire</a></h1>
        <div class="login-form">
            <a href="#" class="login-link">Secure log in</a>
            <ul class="social-navigation">
                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
            </ul>
        </div>
        <ul class="top-navigation">
            <li><a href="page.html">Locate</a></li>
            <li><a href="review.html">Review</a></li>
            <li><a href="page.html">Add</a></li>
        </ul>
        <a href="#menu" class="mobile-navigation-button"><i class="fa fa-bars"></i></a>
    </div>
    <div class="strip">
        <div class="hero">
            <div class="green-bar">
                <p>International Conference Venue Review Service</p>
            </div>
            <div class="page-image google-map">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d75993.07573252273!2d-2.2936314439768397!3d53.47232715174449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2suk!4v1451000799545"
                            width="1100"
                            height="247"
                            frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="cta">
                    <a href="https://www.google.co.uk/maps/place/Manchester/@53.4723272,-2.2936312,12z/data=!3m1!4b1!4m2!3m1!1s0x487a4d4c5226f5db:0xd9be143804fe6baa" target="_blank">
                        <span class="icon"></span>
                        <span class="text">View map</span>
                    </a>
                </div>
            </div>

            <form id="search" name="search" action="results.html" method="post" class="search" autocomplete="off">
                <div class="row">
                    <label for="location">Location</label>
                    <input type="text" name="location" value="" id="location" placeholder="Location">
                </div>
                <div class="row">
                    <label for="capacity">Capacity (optional)</label>
                    <input type="text" name="capacity" value="" id="capacity" placeholder="Capacity (optional)">
                </div>
                <div class="row submit">
                    <button>
                        Venue<br />Search
                    </button>
                </div>
                <p class="advanced-link"><a href="#">Advanced Search</a></p>
            </form>
        </div>
    </div>
    <div class="body">
        <div class="main-copy">
            <div class="col col-2-of-3">

                <div class="page-title venue">
                    <h2>Rocco Forte The Lorry Hotel</h2>
                    <p>50 Dutch street Pl. Chapel Wharf, Manchester M3 5LH.</p>
                    <div class="ratings-meta">
                        <div class="stars-score">
                            <div class="score score-4"></div>
                            <div class="full-score">
                                <table cellpadding="0" cellspacing="10" border="0">
                                    <tr>
                                        <td class="score-type">5</td>
                                        <td class="score-bar" width="200">
                                            <span style="width: 80%">&nbsp;</span>
                                        </td>
                                        <td class="score-value">8</td>
                                    </tr>
                                    <tr>
                                        <td class="score-type">4</td>
                                        <td class="score-bar" width="200">
                                            <span style="width: 90%">&nbsp;</span>
                                        </td>
                                        <td class="score-value">9</td>
                                    </tr>
                                    <tr>
                                        <td class="score-type">3</td>
                                        <td class="score-bar" width="200">
                                            <span style="width: 10%">&nbsp;</span>
                                        </td>
                                        <td class="score-value">1</td>
                                    </tr>
                                    <tr>
                                        <td class="score-type">2</td>
                                        <td class="score-bar" width="200">
                                            <span style="width: 30%">&nbsp;</span>
                                        </td>
                                        <td class="score-value">3</td>
                                    </tr>
                                    <tr>
                                        <td class="score-type">1</td>
                                        <td class="score-bar" width="200">
                                            <span style="width: 20%">&nbsp;</span>
                                        </td>
                                        <td class="score-value">2</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="#" class="reviews">46 reviews</a>
                    </div>
                </div>

                <div class="venue-information">

                    <?php
                    $singleThumbnailClass = "";
                    if($thumbnails == 1){
                        $singleThumbnailClass = ' single-thumbnail';
                    }
                    ?>

                    <div class="venue-details<?php echo $singleThumbnailClass; ?>">

                    <?php if($thumbnails == 1){ ?>

                        <div class="venue-image-thumbnail-large">
                            <a href="uploaded/venue-big-1.jpg" class="fancybox" rel="group"><img src="uploaded/venue-thumbnail-large.jpg" width="134" height="132" alt="" class="venue-image-thumbnail" /></a>
                        </div>

                    <?php } ?>

                        <div class="copy">
                            <a href="http://www.lowryhotel.com" class="link website" target="_blank">www.lowryhotel.com</a>
                            <dl>
                                <dt>Contact:</dt>
                                <dd>Roberta Miller</dd>
                            </dl>
                            <a href="mailto:contact@lowryhotel.com" class="link email">contact@lowryhotel.com</a>
                            <a href="tel:+441617558496" class="link phone">+44&nbsp;(0)&nbsp;161&nbsp;755&nbsp;8496</a>
                        </div>
                        <div class="venue-capacity">
                            <dl>
                                <dt>Largest room capacity</dt>
                                <dd>600</dd>
                                <dt>Total capacity</dt>
                                <dd>900</dd>
                            </dl>
                            <span class="cright"></span>
                        </div>
                        <div class="cleft"></div>

                    </div>

                    <?php if($thumbnails > 1){ ?>

                        <div class="venue-image-thumbnails">
                            <ul class="thumbnails">
                                <li><a href="uploaded/venue-big-1.jpg" class="fancybox" rel="group"><img src="uploaded/venue-thumbnail-1.jpg" width="67" height="66" alt="" class="venue-image-thumbnail" /></a></li>
                                <li><a href="uploaded/venue-big-2.jpg" class="fancybox" rel="group"><img src="uploaded/venue-thumbnail-2.jpg" width="67" height="66" alt="" class="venue-image-thumbnail" /></a></li>
                                <li><a href="uploaded/venue-big-3.jpg" class="fancybox" rel="group"><img src="uploaded/venue-thumbnail-3.jpg" width="67" height="66" alt="" class="venue-image-thumbnail" /></a></li>
                                <li><a href="uploaded/venue-big-4.jpg" class="fancybox" rel="group"><img src="uploaded/venue-thumbnail-4.jpg" width="67" height="66" alt="" class="venue-image-thumbnail" /></a></li>
                                <li><a href="#" class="more-or-less">+15</a></li>
                            </ul>
                            <span class="cleft"></span>
                        </div>

                    <?php } ?>

                    <div class="venue-reviews">
                        <h2>User reviews</h2>
                        <table border="0" cellspacing="0" cellpadding="0" class="reviews-table">
                            <tr class="main-header">
                                <th scope="col">Review date
                                    <a href="#" class="sort asc">sort</a></th>
                                <th scope="col" class="special-col">Reviewer
                                    <br /><span class="attendee">Attendee</span>/<span class="planner">Planner</span>
                                    <a href="#" class="sort asc">sort</a></th>
                                <th scope="col">No of <br />Attendees
                                    <a href="#" class="sort asc">sort</a></th>
                                <th scope="col">Rating
                                    <a href="#" class="sort desc">sort</a></th>
                                <th scope="col">Detailed review</th>
                            </tr>
                            <tr>
                                <td class="review-date">12/02/2016</td>
                                <td class="reviewer">Mrs A. Thompson<br />
                                    <span class="attendee">Event Attendee</span><br />
                                    Sector: Medical</td>
                                <td class="attendance digit">280</td>
                                <td class="rating digit">5 <span class="star-rating"></span></td>
                                <td><a href="#" class="show-hide-full-details" data-view="review-id-1"><span class="show-details">Show</span><span class="hide-details">Hide</span> <br />review details</a></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div class="snap-shot">
                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. <a href="#">Read&nbsp;more</a> </p>
                                    </div>
                                    <div id="review-id-1" class="full-detail">
                                        <h3>Criteria</h3>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="criteria">
                                            <tr class="open-close" data-open-close="review-1-sub-criteria-1">
                                                <th scope="row">1) Contract <span>(overall score)</span></th>
                                                <td>
                                                    <span class="scores">
                                                        <span class="overall-score" style="width: 100%"></span>
                                                    </span>
                                                    <div class="cright"></div>
                                                </td>
                                            </tr>
                                            <tr id="review-1-sub-criteria-1" class="sub-criteria-container display-none">
                                                <td colspan="2">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sub-criteria">
                                                        <tr>
                                                            <th scope="row">Was there sufficient time?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 100%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Was packaging provided?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 92%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">How well were issues handled in aftermath?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 77%"></span></span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="open-close" data-open-close="review-1-sub-criteria-2">
                                                <th scope="row">2) Setting up conditions <span>(overall score)</span></th>
                                                <td>
                                                    <span class="scores">
                                                        <span class="overall-score" style="width: 80%"></span>
                                                    </span>
                                                    <div class="cright"></div>
                                                </td>
                                            </tr>
                                            <tr id="review-1-sub-criteria-2" class="sub-criteria-container display-none">
                                                <td colspan="2">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sub-criteria">
                                                        <tr>
                                                            <th scope="row">Was there sufficient time?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 100%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Was packaging provided?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 92%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">How well were issues handled in aftermath?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 77%"></span></span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="open-close" data-open-close="review-1-sub-criteria-3">
                                                <th scope="row">3) Winding up conditions <span>(overall score)</span></th>
                                                <td>
                                                    <span class="scores">
                                                        <span class="overall-score" style="width: 73%"></span>
                                                    </span>
                                                    <div class="cright"></div>
                                                </td>
                                            </tr>
                                            <tr id="review-1-sub-criteria-3" class="sub-criteria-container display-none">
                                                <td colspan="2">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sub-criteria">
                                                        <tr>
                                                            <th scope="row">Was there sufficient time?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 100%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Was packaging provided?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 92%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">How well were issues handled in aftermath?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 77%"></span></span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="open-close" data-open-close="review-1-sub-criteria-4">
                                                <th scope="row">4) Accessibility of conference venue <span>(overall score)</span></th>
                                                <td>
                                                    <span class="scores">
                                                        <span class="overall-score" style="width: 88%"></span>
                                                    </span>
                                                    <div class="cright"></div>
                                                </td>
                                            </tr>
                                            <tr id="review-1-sub-criteria-4" class="sub-criteria-container display-none">
                                                <td colspan="2">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sub-criteria">
                                                        <tr>
                                                            <th scope="row">Was there sufficient time?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 100%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Was packaging provided?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 92%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">How well were issues handled in aftermath?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 77%"></span></span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="review-date">24/12/2015</td>
                                <td class="reviewer">Mr S. Wilkins<br />
                                    <span class="planner">Event Planner</span><br />
                                    Sector: Automotive</td>
                                <td class="attendance digit">350</td>
                                <td class="rating digit">1 <span class="star-rating"></span></td>
                                <td><a href="#" data-view="review-id-2" class="show-hide-full-details"><span class="show-details">Show</span><span class="hide-details">Hide</span> <br />review details</a></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div class="snap-shot">
                                        <p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. <a href="#">Read&nbsp;more</a> </p>
                                    </div>
                                    <div id="review-id-2" class="full-detail">
                                        <h3>Criteria</h3>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="criteria">
                                            <tr class="open-close" data-open-close="review-2-sub-criteria-1">
                                                <th scope="row">1) Contract <span>(overall score)</span></th>
                                                <td>
                                                    <span class="scores">
                                                        <span class="overall-score" style="width: 100%"></span>
                                                    </span>
                                                    <div class="cright"></div>
                                                </td>
                                            </tr>
                                            <tr id="review-2-sub-criteria-1" class="sub-criteria-container display-none">
                                                <td colspan="2">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sub-criteria">
                                                        <tr>
                                                            <th scope="row">Was there sufficient time?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 100%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Was packaging provided?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 92%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">How well were issues handled in aftermath?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 77%"></span></span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="open-close" data-open-close="review-2-sub-criteria-2">
                                                <th scope="row">2) Setting up conditions <span>(overall score)</span></th>
                                                <td>
                                                    <span class="scores">
                                                        <span class="overall-score" style="width: 80%"></span>
                                                    </span>
                                                    <div class="cright"></div>
                                                </td>
                                            </tr>
                                            <tr id="review-2-sub-criteria-2" class="sub-criteria-container display-none">
                                                <td colspan="2">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sub-criteria">
                                                        <tr>
                                                            <th scope="row">Was there sufficient time?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 100%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Was packaging provided?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 92%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">How well were issues handled in aftermath?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 77%"></span></span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="open-close" data-open-close="review-2-sub-criteria-3">
                                                <th scope="row">3) Winding up conditions <span>(overall score)</span></th>
                                                <td>
                                                    <span class="scores">
                                                        <span class="overall-score" style="width: 73%"></span>
                                                    </span>
                                                    <div class="cright"></div>
                                                </td>
                                            </tr>
                                            <tr id="review-2-sub-criteria-3" class="sub-criteria-container display-none">
                                                <td colspan="2">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sub-criteria">
                                                        <tr>
                                                            <th scope="row">Was there sufficient time?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 100%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Was packaging provided?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 92%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">How well were issues handled in aftermath?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 77%"></span></span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="open-close" data-open-close="review-2-sub-criteria-4">
                                                <th scope="row">4) Accessibility of conference venue <span>(overall score)</span></th>
                                                <td>
                                                    <span class="scores">
                                                        <span class="overall-score" style="width: 88%"></span>
                                                    </span>
                                                    <div class="cright"></div>
                                                </td>
                                            </tr>
                                            <tr id="review-2-sub-criteria-4" class="sub-criteria-container display-none">
                                                <td colspan="2">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sub-criteria">
                                                        <tr>
                                                            <th scope="row">Was there sufficient time?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 100%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Was packaging provided?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 92%"></span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">How well were issues handled in aftermath?</th>
                                                            <td><span class="scores"><span class="overall-score" style="width: 77%"></span></span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col col-1-of-3 col-hide">
                <div class="highlighted">
                    <a href="news.html">
                        <img src="uploaded/highlighted.jpg" alt="" />
                        <span class="title">The perfect location</span>
                    </a>
                </div>
            </div>
            <span class="cleft"></span>
        </div>
    </div>
    <div class="foot">
        <div class="footer">
            <ul class="footer-navigation">
                <li><a href="#">venues</a></li>
                <li><a href="#">about</a></li>
                <li><a href="#">contact</a></li>
                <li><a href="news.html">news</a></li>
            </ul>
            <div class="cright"></div>
        </div>
    </div>
</div>
<nav id="menu">
    <ul>
        <li><span>Search</span>
            <ul>
                <li>
                    <form id="mobile-search" name="mobile-search" action="results.html" method="post" class="mobile-search-form" autocomplete="off">
                        <input type="text" name="location" value="" placeholder="Location">
                        <input type="text" name="capacity" value="" placeholder="Capacity (optional)">
                        <button>Venue search</button>
                        <a href="#" class="advanced-search-button">Advanced Search</a>
                    </form>
                </li>
            </ul>
        </li>
        <li><a href="page.html">Locate</a></li>
        <li><a href="review.html">Review</a></li>
        <li><a href="page.html">Add</a></li>
    </ul>
</nav>
<div id="results-container" class="hidden"></div>
<script src="js/vendors/jquery-1.9.1.min.js"></script>
<script src="js/vendors/fancybox/jquery.fancybox.js"></script>
<script src="js/vendors/mmenu/jquery.mmenu.min.all.js"></script>
<script src="js/convenire.js"></script>
</body>
</html>