<p>Use the this file to create your subscribers list.
    <span>
        <a href="{{action('Client\ImportController@downloadSample')}}" class="btn btn-primary btn-xs">Sample
            <i class="fa fa-file-excel-o"></i></a>
    </span>
</p>

<p>To ensure a successful bulky importation of subscribers, you are required to prepare an <strong>EXCEL FILE</strong>
    containing a listing of subscribers. All subscribers to be imported should belong to the
    selected group(s) above.</p>

<p>
    Your Excel sheet should contain the following columns:
<ul class="bold">
    <li>Name</li>
    <li>Surname</li>
    <li>Phone</li>
    <li>Email (maybe be blank)</li>
    <li>Profile (maybe be blank)</li>
    <li>Username (maybe be blank)</li>
    <li>Password (maybe be blank)</li>
</ul>
<p class="bold">
    NB:
<ul>
    <li>If you leave any of the mandatory fields blank, that entry will not be processed</li>
    <li>If you leave the username blank, the username will be <em>surnamen</em> e.g for John Doe=>doej</li>
    <li>If you leave the password blank, the password will be <em>surname</em> e.g for John Doe=>doe</li>
    <li>If you leave the profile blank, the profile will be <em>Subscriber</em></li>
    <li>Subscribers with no emails will not be able to recover their forgotten passwords,
        and will not receive any email notifications.</li>
</ul>
</p>