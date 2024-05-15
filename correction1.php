// Dropdown Menu


<a class="dropdown-item" href="#Section9" id="sec9">Installation Report</a>
<a class="dropdown-item" href="#Section20" id="sec20">Ipv4 Table</a>
<a class="dropdown-item" href="#Section21" id="sec21">Breakdown History</a>
<a class="dropdown-item" href="#Section22" id="sec22">Breakdown Report</a>
<a class="dropdown-item" href="#Section13" id="sec13">Availability Report</a>
<a class="dropdown-item" href="#Section24" id="sec24">Installed Machines</a>
<a class="dropdown-item" href="#Section23" id="sec23">Acquire Report</a>


<section id="Section21" class="mx-4 rounded shadow">
    <h1 class="text-white">Hello1</h1>
</section>
<section id="Section22" class="mx-4 rounded shadow">
    <h1 class="text-white">Hello2</h1>
</section>
<section id="Section23" class="mx-4 rounded shadow">
    <h1 class="text-white">Hello3</h1>
</section>
<section id="Section24" class="mx-4 rounded shadow">
    <h1 class="text-white">Hello4</h1>
</section>




$('#sec21').click(function() {
    alert("section 21 clicked");
    $('section').css('display', 'none');
    document.getElementById('Section21').style.display = 'block';
});
$('#sec24').click(function() {
    alert("section 24 clicked");
    $('section').css('display', 'none');
    document.getElementById('Section24').style.display = 'block';
});
$('#sec22').click(function() {
    alert("section 22 clicked");
    $('section').css('display', 'none');
    document.getElementById('Section22').style.display = 'block';
});
$('#sec23').click(function() {
    alert("section 23 clicked");
    $('section').css('display', 'none');
    document.getElementById('Section23').style.display = 'block';
});
