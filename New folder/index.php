

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"
></script>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>PHINMA UPang Alumni Tracker | ADMIN</title>
	<meta charset="utf-8">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/alumni_logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
	<!-- Header Area Start -->
	<header>
		<div class="left_area">
			<h3>UPANG <span>ALUMNI TRACKER</span></h3>
		</div>
		<div class="rigth_area">
			<a href="logout.php" class="logout_btn">Logout</a>
		</div>
	</header>
	<!-- Header Area End -->

	<!-- Sidebar Area Start -->
	<div class="sidebar">
		<content>
			<center>
				<img src="images/logo.png" class="profile_image" alt="admin">
			</center>
		</content>
		<a href="index.php" class="active"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
		<a href="alumni.php"><i class="fas fa-cogs"></i><span>Alumni</span></a>
		<a href="announcements.php"><i class="fas fa-table"></i><span>Announcements</span></a>
		<a href="events.php"><i class="fas fa-th"></i><span>Events</span></a>
		<a href="job.php"><i class="fas fa-circle"></i><span>Job Offers</span></a>
		<a href="editpages.php"><i class="fas fa-sliders-h"></i><span>Edit Pages</span></a>
	</div>
	<!-- Sidebar Area End -->

	<!-- Content Area Start -->
	<div class="content">
		<content>
			<div class="dashboard">

      </div>
       <div class="main1">
    <div class="containers">
      <div class="row justify-content-center"   style="margin: 40px; margin-top: 15px; border-radius: 10px; padding: 10px;">
        <div class="col-12">

      <!--   <h2 style="font-family: Poppins; background-color: #032708; padding: 15px 0px 15px 15px; color: #ffff; font-size: 25px;"><b>Dashboard</b></h2> -->

        <div class="main__cards">
            <div class="card">
            <i class="fas fa-users" style="font-size:48px;color: #5EB6FF"></i>
            <div class="card_inner">
              <p class="text-primary-p">Total Employed Graduates</p>
              <span class="font-bold text-title" id="totalemployed">0</span>
            </div>
          </div>

            <div class="card">
              <i class="fas fa-users" style="font-size:48px;color: #61C589"></i>
              <div class="card_inner">
                <p class="text-primary-p">Total Unemployed Graduates</p>
                <span class="font-bold text-title" id="totalunemployed">0</span>
              </div>
            </div>

          <div class="card">
            <i class="fas fa-users" style="font-size:48px; color: #ffcc7b"></i>
            <div class="card_inner">
              <p class="text-primary-p">Total Number of Graduates</p>
              <span class="font-bold text-title" id="totalalumni">0</span>
            </div>
          </div>

     
        </div>

         <h2 class="semi-bold m-t-30 new_order_head">Total Employed and Unemployed Graduates</h2>             
    <div class="form-row">      
      <div class="form-group col-md-2">
        <label>Year: </label>
        <select id="filterSalesPerYear">
        	<option value="1925">1925</option>
    <option value="1926">1926</option>
    <option value="1927">1927</option>
    <option value="1928">1928</option>
    <option value="1929">1929</option>
    <option value="1930">1930</option>
    <option value="1931">1931</option>
    <option value="1932">1932</option>
    <option value="1933">1933</option>
    <option value="1934">1934</option>
    <option value="1935">1935</option>
    <option value="1936">1936</option>
    <option value="1937">1937</option>
    <option value="1938">1938</option>
    <option value="1939">1939</option>
    <option value="1940">1940</option>
    <option value="1941">1941</option>
    <option value="1942">1942</option>
    <option value="1943">1943</option>
    <option value="1944">1944</option>
    <option value="1945">1945</option>
    <option value="1946">1946</option>
    <option value="1947">1947</option>
    <option value="1948">1948</option>
    <option value="1949">1949</option>
    <option value="1950">1950</option>
    <option value="1951">1951</option>
    <option value="1952">1952</option>
    <option value="1953">1953</option>
    <option value="1954">1954</option>
    <option value="1955">1955</option>
    <option value="1956">1956</option>
    <option value="1957">1957</option>
    <option value="1958">1958</option>
    <option value="1959">1959</option>
    <option value="1960">1960</option>
    <option value="1961">1961</option>
    <option value="1962">1962</option>
    <option value="1963">1963</option>
    <option value="1964">1964</option>
    <option value="1965">1965</option>
    <option value="1966">1966</option>
    <option value="1967">1967</option>
    <option value="1968">1968</option>
    <option value="1969">1969</option>
    <option value="1970">1970</option>
    <option value="1971">1971</option>
    <option value="1972">1972</option>
    <option value="1973">1973</option>
    <option value="1974">1974</option>
    <option value="1975">1975</option>
    <option value="1976">1976</option>
    <option value="1977">1977</option>
    <option value="1978">1978</option>
    <option value="1979">1979</option>
    <option value="1980">1980</option>
    <option value="1981">1981</option>
    <option value="1982">1982</option>
    <option value="1983">1983</option>
    <option value="1984">1984</option>
    <option value="1985">1985</option>
    <option value="1986">1986</option>
    <option value="1987">1987</option>
    <option value="1988">1988</option>
    <option value="1989">1989</option>
    <option value="1990">1990</option>
    <option value="1991">1991</option>
    <option value="1992">1992</option>
    <option value="1993">1993</option>
    <option value="1994">1994</option>
    <option value="1995">1995</option>
    <option value="1996">1996</option>
    <option value="1997">1997</option>
    <option value="1998">1998</option>
    <option value="1999">1999</option>
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
        </select>
      </div>
    </div>

        

				
			</div>
		</content>
	</div>
	<!-- Content Area End -->

	<footer>

	</footer>
</body>
</html>

<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nesciunt, amet officia soluta, dolores dolor?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, consequuntur. -->