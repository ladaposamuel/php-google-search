<?php
require('reqs/funcs.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A staybusy Project.">
    <title>Search google with php</title>
    
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <!--<![endif]-->
    
    
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?php echo $root_url ?>/css/layouts/blog-old-ie.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="<?php echo $root_url ?>/css/layouts/blog.css">
        <!--<![endif]-->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
<div id="layout" class="pure-g">
    <div class="sidebar pure-u-1 pure-u-md-1-4">
        <div class="header">
            
            <h1 class="brand-title"><img  class="logo" src="https://www.shareicon.net/download/128x128//2016/08/01/805270_bar_512x512.png" alt=""> ChocoBar</h1>
            <h2 class="brand-tagline">A PHP search engine powered by Google</h2>

            <nav class="nav">
                <ul class="nav-list">
                  
                    <li class="nav-item">
                        <a class="pure-button" href="https://developers.google.com/custom-search/">What is Google custom search?</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="content pure-u-1 pure-u-md-3-4">
        <div>
            <!-- A wrapper for all the blog posts -->
           
            <div class="posts">
                <h1 class="content-subhead">Descriptions</h1>

<pre>
PHP code snippet that uses Google API to make a search on google.com
</pre>
                <section class="post">
                    <header class="post-header">
                        <h2 class="post-title">Search</h2>
                    </header>
                    <div class="post-description">
                
                    <form class="pure-form pure-form-aligned" method="POST" action="">
    <fieldset>
        <div class="pure-control-group">
            <label for="search"></label>
            <input id="search" type="text" name="query" placeholder="How to make noodles">
        </div>
        <div class="pure-controls">
            <button type="submit" name="search" class="pure-button pure-button-primary">Search</button>
        </div>
    </fieldset>
</form>
                    </div>
                </section>
          <hr>
<table class="pure-table pure-table-horizontal">
    <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Url</th>
            <th>Title</th>
            <th>Full data</th>
        </tr>
    </thead>
    <tbody>
<?php
if(isset($_POST['search'])){
$query= urlencode($_POST['query']);
$url = "https://www.googleapis.com/customsearch/v1?key=$key&cx=$cx&q=".$query;
$body = file_get_contents($url);
$json = json_decode($body);
if ($json->items){
   foreach ($json->items as $item){
    ?>
  <tr> 
            <td><img src="<?php echo $item->pagemap->cse_thumbnail[0]->src ?>" width="50" height="50"></td>
            <td><a href="<?php echo  $item->formattedUrl; ?>"><?php echo  $item->formattedUrl; ?></a></td>
            <td><?php echo  $item->title; ?></td>
            <td>
                
                <textarea>
                    <?php print($body) ?>
                </textarea>
            </td>
        </tr>
<?php   }
}
}
?>      
    </tbody>
</table>


            </div>
            <div class="footer">
                <div class="pure-menu pure-menu-horizontal">
                    <ul>
                        <li class="pure-menu-item"><a href="tel:+2348068170006" class="pure-menu-link">Ladapo Samuel</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>