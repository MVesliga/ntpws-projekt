<?php 
	print '
        <h2 class="text-center">Check the covid situation in your country if you want to attend a concert in the near future!</h2>
        <div class="d-flex justify-content-center mt-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                <p>Country: <span class="country font-weight-bold"></span></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p>Confirmed Covid-19 cases: <span class="confirmed font-weight-bold"></span></p></li>
                    <li class="list-group-item"><p>Critical Covid-19 cases: <span class="critical font-weight-bold"></span></p></li>
                    <li class="list-group-item"><p>Deaths caused by Covid-19: <span class="deaths font-weight-bold"></span></p></li>
                    <li class="list-group-item"><p>Data last updated at: <span class="lastUpdate font-weight-bold"></span></p></li>
                    <li class="list-group-item"><p>People recovered from Covid-19: <span class="recovered font-weight-bold"></span></p>
            </div></li>
                </ul>
            </div>
        </div>
    ';
?>