<!-- This is the form at the bottom of each page which takes
the various search options and adds them to the URL for GET 
processing.-->

<div id = "post_form">
<form id="search_filters" name="search_filters" method="GET" action="/pocarlab/logbook/search.php">

<center>
<table>
<tr>
<td style="border: 0;"><input type="submit" value="Search">
<td style="border: 0;"><select name="log" id="logname">
    <option value="posts_borexino" <?php if ($_GET["log"] == "posts_borexino"){echo "selected";} ?>>Borexino</option>
    <option value="posts_darkside" <?php if ($_GET["log"] == "posts_darkside"){echo "selected";} ?>>Darkside</option>
    <option value="posts_analysis" <?php if ($_GET["log"] == "posts_analysis"){echo "selected";} ?>>EXO-200/nEXO Anls. & Sim.</option>
    <option value="posts_lxe" <?php if ($_GET["log"] == "posts_lxe"){echo "selected";} ?>>Liquid Xenon System</option>
    <option value="posts_photosensor" <?php if ($_GET["log"] == "posts_photosensor"){echo "selected";} ?>>Photosensor Test Branch</option>
    <option value="posts_misc" <?php if ($_GET["log"] == "posts_misc"){echo "selected";} ?>>Miscellaneous</option>
</select>

<td><input type="text" name="post_id" placeholder="Entry #" size="5" maxlength="5">
<td><input type="text" name="username" placeholder="Username" size="15">
<td><input type="text" name="begdate" placeholder="Posted After YYYY-MM-DD" size="21" maxlength="10">
<td><input type="text" name="endate" placeholder="Posted Before YYYY-MM-DD" size="21" maxlength="10">
<td><input type="text" name="search_string" placeholder="Containing...">
</table>
<input type="hidden" name="filters" value="Search">
</form>
</div>

