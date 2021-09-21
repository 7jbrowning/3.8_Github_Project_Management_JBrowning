<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Graeme's Grooves</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="icon" type="image/ico" href="favicon.ico">
   </head>
   <body>
      <div id="wrapper">
         <div id="box1" class="box">
            <!--banners-->			
            <div id="banner">
               <div><img src="images/Banner1v2.jpg" class="images" alt="banner1" width="1400" height="200"></div>
            </div>
         </div>
         
         <!--Main text section-->
         <div id="maincontent" class="box">
			 <heading1>
				 <Space></Space>
				 <Song_ID><h4>Song ID</h4></Song_ID>
				 <Genre><h4>Genre</h4></Genre>
			  	 <Artist><h4>Artist</h4></Artist>
				 <Album><h4>Album</h4></Album>
				 <Title><h4>Title</h4></Title>
				 <Filename><h4>Filename</h4></Filename>
				 <Duration><h4>Duration</h4></Duration>
				 
				 <Space></Space>
			 </heading1>
			 <content>
				 <?php
				 	require "Assessment_mysqli.php";
				 
				 	//Creates a variable to store the sql query
				 	$query = ("SELECT m.Song_ID, g.Genre, r.Artist, l.Album, t.Title, f.Filename, m.Duration
					FROM musicDetails AS m
					JOIN musicToArtist AS j ON m.Song_ID = j.Song_ID 
					JOIN artistDetails AS r ON r.Artist_ID = j.Artist_ID
					JOIN musicToAlbum AS k ON m.Song_ID = k.Song_ID 
					JOIN albumDetails AS l ON l.Album_ID = k.Album_ID
					JOIN musicToGenre AS h ON m.Song_ID = h.Song_ID 
					JOIN genreDetails AS g ON g.Genre_ID = h.Genre_ID
					INNER JOIN fileDetails AS f ON m.File_ID = f.File_ID
					INNER JOIN titleDetails AS t ON m.Title_ID = t.Title_ID
					ORDER BY t.Title DESC, r.Artist DESC");
				 
				 	//Runs and stores the query using the variables $con (see nav.php) and $query
				 	$result = mysqli_query($conn,$query);
					//runs in a 'while' loop
				 	while($output=mysqli_fetch_array($result))
					{
					?>
				 	<!-- php is above. HTML is below. Used to output the query results -->
				 
				 	<heading2>
						<space></space>
						<Song_ID><p class = 'white'><?php echo $output['Song_ID']; ?></p></Song_ID>
						<Genre><p class = 'white'><?php echo $output['Genre']; ?></p></Genre>
						<Artist><p class = 'white'><?php echo $output['Artist']; ?></p></Artist>
						<Album><p class = 'white'><?php echo $output['Album']; ?></p></Album>
						<Title><p class = 'white'><?php echo $output['Title']; ?></p></Title>
						<Filename><p class = 'white'><?php echo $output['Filename']; ?></p></Filename>
						<Duration><p class = 'white'><?php echo $output['Duration']; ?></p></Duration>
						
				 </heading2>
				 <?php
				 //Closes the output while loop
				 }
				 ?>
				 
				 
			 </content>			 
			 
			 
		  </div>
         
		<!--Aside-->
        
		<div id="aside" class="box">
            <div align="center">
               <?php
				//Pulls the links from the nav.php page and places them in the navigation div
				require "08_nav.php" //'require' is 100% needed for the site to run 
			?>
            </div>
		</div>
      </div>
   </body>
   <!--footer-->
   <footer>
	   <p>&copy; Jack Browning 2021</p>
   </footer>
</html>