<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.3.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.3.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-documentation">
                                <a href="#endpoints-GETapi-documentation">Handles the API request and renders the Swagger documentation view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-oauth2-callback">
                                <a href="#endpoints-GETapi-oauth2-callback">Handles the OAuth2 callback and retrieves the required file for the redirect.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-patients">
                                <a href="#endpoints-GETapi-v1-patients">GET api/v1/patients</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-patients">
                                <a href="#endpoints-POSTapi-v1-patients">POST api/v1/patients</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-patients--id-">
                                <a href="#endpoints-GETapi-v1-patients--id-">GET api/v1/patients/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-patients--id-">
                                <a href="#endpoints-PUTapi-v1-patients--id-">PUT api/v1/patients/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-patients--id-">
                                <a href="#endpoints-DELETEapi-v1-patients--id-">DELETE api/v1/patients/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-visits">
                                <a href="#endpoints-GETapi-v1-visits">GET api/v1/visits</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-visits">
                                <a href="#endpoints-POSTapi-v1-visits">POST api/v1/visits</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-visits--id-">
                                <a href="#endpoints-GETapi-v1-visits--id-">GET api/v1/visits/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-visits--id-">
                                <a href="#endpoints-PUTapi-v1-visits--id-">PUT api/v1/visits/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-visits--id-">
                                <a href="#endpoints-DELETEapi-v1-visits--id-">DELETE api/v1/visits/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-patients--patient_id--visits">
                                <a href="#endpoints-GETapi-v1-patients--patient_id--visits">GET api/v1/patients/{patient_id}/visits</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: September 13, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-documentation">Handles the API request and renders the Swagger documentation view.</h2>

<p>
</p>



<span id="example-requests-GETapi-documentation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/documentation" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/documentation"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-documentation">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-documentation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-documentation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-documentation"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-documentation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-documentation">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-documentation" data-method="GET"
      data-path="api/documentation"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-documentation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-documentation"
                    onclick="tryItOut('GETapi-documentation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-documentation"
                    onclick="cancelTryOut('GETapi-documentation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-documentation"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/documentation</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-documentation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-documentation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-oauth2-callback">Handles the OAuth2 callback and retrieves the required file for the redirect.</h2>

<p>
</p>



<span id="example-requests-GETapi-oauth2-callback">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/oauth2-callback" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/oauth2-callback"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-oauth2-callback">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!doctype html&gt;
&lt;html lang=&quot;en-US&quot;&gt;
&lt;body&gt;
&lt;/body&gt;
&lt;/html&gt;
&lt;script src=&quot;oauth2-redirect.js&quot;&gt;&lt;/script&gt;</code>
 </pre>
    </span>
<span id="execution-results-GETapi-oauth2-callback" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-oauth2-callback"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-oauth2-callback"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-oauth2-callback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-oauth2-callback">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-oauth2-callback" data-method="GET"
      data-path="api/oauth2-callback"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-oauth2-callback', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-oauth2-callback"
                    onclick="tryItOut('GETapi-oauth2-callback');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-oauth2-callback"
                    onclick="cancelTryOut('GETapi-oauth2-callback');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-oauth2-callback"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/oauth2-callback</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-oauth2-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-oauth2-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-patients">GET api/v1/patients</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-patients">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/patients" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/patients"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-patients">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;draw&quot;: 0,
    &quot;recordsTotal&quot;: 12,
    &quot;recordsFiltered&quot;: 12,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Fred Lowe&quot;,
            &quot;nik&quot;: &quot;6678134268753623&quot;,
            &quot;gender&quot;: &quot;P&quot;,
            &quot;birth_date&quot;: &quot;2021-05-13&quot;,
            &quot;phone&quot;: &quot;601.217.7975&quot;,
            &quot;address&quot;: &quot;91260 Dooley Branch\nSatterfieldville, PA 35966-7266&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 1
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Vanessa Ankunding&quot;,
            &quot;nik&quot;: &quot;937270306704458&quot;,
            &quot;gender&quot;: &quot;L&quot;,
            &quot;birth_date&quot;: &quot;1970-04-09&quot;,
            &quot;phone&quot;: &quot;(573) 723-1097&quot;,
            &quot;address&quot;: &quot;67991 Xzavier Orchard Apt. 362\nWest Candice, WY 49341&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 2
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Miss Christine Grady DVM&quot;,
            &quot;nik&quot;: &quot;9191313163843184&quot;,
            &quot;gender&quot;: &quot;L&quot;,
            &quot;birth_date&quot;: &quot;1983-07-07&quot;,
            &quot;phone&quot;: &quot;551.917.0460&quot;,
            &quot;address&quot;: &quot;466 Victor Hill\nEast Lyric, GA 76184&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 3
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Dr. Germaine Watsica PhD&quot;,
            &quot;nik&quot;: &quot;7796943272871063&quot;,
            &quot;gender&quot;: &quot;P&quot;,
            &quot;birth_date&quot;: &quot;2004-02-01&quot;,
            &quot;phone&quot;: &quot;636.210.0076&quot;,
            &quot;address&quot;: &quot;2688 Barton Center\nSouth Margiestad, MS 34233-6378&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 4
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Donato Stehr&quot;,
            &quot;nik&quot;: &quot;9355806771216926&quot;,
            &quot;gender&quot;: &quot;P&quot;,
            &quot;birth_date&quot;: &quot;1986-08-21&quot;,
            &quot;phone&quot;: &quot;1-989-332-8967&quot;,
            &quot;address&quot;: &quot;4848 Annetta Prairie\nEast Delpha, AK 34170&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 5
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Annalise Bailey&quot;,
            &quot;nik&quot;: &quot;891963613443304&quot;,
            &quot;gender&quot;: &quot;P&quot;,
            &quot;birth_date&quot;: &quot;2021-10-24&quot;,
            &quot;phone&quot;: &quot;520.268.4883&quot;,
            &quot;address&quot;: &quot;891 Steuber Knolls\nBatzmouth, VT 31599-2220&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 6
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Larissa Hane&quot;,
            &quot;nik&quot;: &quot;3296680866340488&quot;,
            &quot;gender&quot;: &quot;L&quot;,
            &quot;birth_date&quot;: &quot;1987-01-05&quot;,
            &quot;phone&quot;: &quot;+18639066742&quot;,
            &quot;address&quot;: &quot;2655 Margarette Wells\nAlfton, NV 17697&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 7
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Mrs. Skyla Huels V&quot;,
            &quot;nik&quot;: &quot;5443564682349646&quot;,
            &quot;gender&quot;: &quot;L&quot;,
            &quot;birth_date&quot;: &quot;1994-01-19&quot;,
            &quot;phone&quot;: &quot;351-219-2680&quot;,
            &quot;address&quot;: &quot;9737 Maverick Walk Apt. 062\nWest Destiny, TX 52570-7771&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 8
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Prof. Felicita Ratke&quot;,
            &quot;nik&quot;: &quot;6845687652323298&quot;,
            &quot;gender&quot;: &quot;P&quot;,
            &quot;birth_date&quot;: &quot;2019-01-18&quot;,
            &quot;phone&quot;: &quot;737-462-0795&quot;,
            &quot;address&quot;: &quot;733 Buster Valley Suite 683\nNew Jaylenport, AL 71630-4441&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 9
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Gunnar Mann V&quot;,
            &quot;nik&quot;: &quot;9412053211244390&quot;,
            &quot;gender&quot;: &quot;P&quot;,
            &quot;birth_date&quot;: &quot;1979-10-31&quot;,
            &quot;phone&quot;: &quot;1-319-430-2629&quot;,
            &quot;address&quot;: &quot;9681 Shanelle Grove Suite 300\nJensenside, NY 10712-8485&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 10
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;wdewe&quot;,
            &quot;nik&quot;: &quot;123&quot;,
            &quot;gender&quot;: &quot;L&quot;,
            &quot;birth_date&quot;: &quot;2025-09-13&quot;,
            &quot;phone&quot;: &quot;+62343123&quot;,
            &quot;address&quot;: &quot;1&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 11
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;ASDSAEDDADSADASD&quot;,
            &quot;nik&quot;: &quot;2313132132132132&quot;,
            &quot;gender&quot;: &quot;P&quot;,
            &quot;birth_date&quot;: &quot;2025-09-01&quot;,
            &quot;phone&quot;: &quot;8123218213123&quot;,
            &quot;address&quot;: &quot;SADADSD1Q234121&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;DT_RowIndex&quot;: 12
        }
    ],
    &quot;disableOrdering&quot;: false
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-patients" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-patients"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-patients"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-patients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-patients">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-patients" data-method="GET"
      data-path="api/v1/patients"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-patients', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-patients"
                    onclick="tryItOut('GETapi-v1-patients');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-patients"
                    onclick="cancelTryOut('GETapi-v1-patients');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-patients"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/patients</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-patients"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-patients"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-patients">POST api/v1/patients</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-patients">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/patients" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"nik\": \"amniihfqcoynlazgh\",
    \"gender\": \"P\",
    \"birth_date\": \"2025-09-13T09:28:19\",
    \"phone\": \"dtqtqxbajwbpi\",
    \"address\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/patients"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "nik": "amniihfqcoynlazgh",
    "gender": "P",
    "birth_date": "2025-09-13T09:28:19",
    "phone": "dtqtqxbajwbpi",
    "address": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-patients">
</span>
<span id="execution-results-POSTapi-v1-patients" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-patients"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-patients"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-patients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-patients">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-patients" data-method="POST"
      data-path="api/v1/patients"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-patients', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-patients"
                    onclick="tryItOut('POSTapi-v1-patients');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-patients"
                    onclick="cancelTryOut('POSTapi-v1-patients');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-patients"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/patients</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-patients"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-patients"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-patients"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>:Attribute maksimal berisi 100 karakter. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nik"                data-endpoint="POSTapi-v1-patients"
               value="amniihfqcoynlazgh"
               data-component="body">
    <br>
<p>:Attribute maksimal berisi 20 karakter. Example: <code>amniihfqcoynlazgh</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-v1-patients"
               value="P"
               data-component="body">
    <br>
<p>Example: <code>P</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>L</code></li> <li><code>P</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birth_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="birth_date"                data-endpoint="POSTapi-v1-patients"
               value="2025-09-13T09:28:19"
               data-component="body">
    <br>
<p>:Attribute bukan tanggal yang valid. Example: <code>2025-09-13T09:28:19</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-v1-patients"
               value="dtqtqxbajwbpi"
               data-component="body">
    <br>
<p>:Attribute maksimal berisi 15 karakter. Example: <code>dtqtqxbajwbpi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-v1-patients"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-patients--id-">GET api/v1/patients/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-patients--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/patients/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/patients/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-patients--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Fred Lowe&quot;,
        &quot;nik&quot;: &quot;6678134268753623&quot;,
        &quot;gender&quot;: &quot;P&quot;,
        &quot;birth_date&quot;: &quot;2021-05-13&quot;,
        &quot;phone&quot;: &quot;601.217.7975&quot;,
        &quot;address&quot;: &quot;91260 Dooley Branch\nSatterfieldville, PA 35966-7266&quot;,
        &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
        &quot;updated_at&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-patients--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-patients--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-patients--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-patients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-patients--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-patients--id-" data-method="GET"
      data-path="api/v1/patients/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-patients--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-patients--id-"
                    onclick="tryItOut('GETapi-v1-patients--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-patients--id-"
                    onclick="cancelTryOut('GETapi-v1-patients--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-patients--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/patients/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-patients--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-patients--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-patients--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the patient. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-patients--id-">PUT api/v1/patients/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-patients--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/v1/patients/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"nik\": \"amniihfqcoynlazgh\",
    \"gender\": \"P\",
    \"birth_date\": \"2025-09-13T09:28:20\",
    \"phone\": \"dtqtqxbajwbpi\",
    \"address\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/patients/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "nik": "amniihfqcoynlazgh",
    "gender": "P",
    "birth_date": "2025-09-13T09:28:20",
    "phone": "dtqtqxbajwbpi",
    "address": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-patients--id-">
</span>
<span id="execution-results-PUTapi-v1-patients--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-patients--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-patients--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-patients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-patients--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-patients--id-" data-method="PUT"
      data-path="api/v1/patients/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-patients--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-patients--id-"
                    onclick="tryItOut('PUTapi-v1-patients--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-patients--id-"
                    onclick="cancelTryOut('PUTapi-v1-patients--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-patients--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/patients/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/patients/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-patients--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-patients--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-patients--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the patient. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-patients--id-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>:Attribute maksimal berisi 100 karakter. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nik"                data-endpoint="PUTapi-v1-patients--id-"
               value="amniihfqcoynlazgh"
               data-component="body">
    <br>
<p>:Attribute maksimal berisi 20 karakter. Example: <code>amniihfqcoynlazgh</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="PUTapi-v1-patients--id-"
               value="P"
               data-component="body">
    <br>
<p>Example: <code>P</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>L</code></li> <li><code>P</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birth_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="birth_date"                data-endpoint="PUTapi-v1-patients--id-"
               value="2025-09-13T09:28:20"
               data-component="body">
    <br>
<p>:Attribute bukan tanggal yang valid. Example: <code>2025-09-13T09:28:20</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-v1-patients--id-"
               value="dtqtqxbajwbpi"
               data-component="body">
    <br>
<p>:Attribute maksimal berisi 15 karakter. Example: <code>dtqtqxbajwbpi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-patients--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-patients--id-">DELETE api/v1/patients/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-patients--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/v1/patients/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/patients/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-patients--id-">
</span>
<span id="execution-results-DELETEapi-v1-patients--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-patients--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-patients--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-patients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-patients--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-patients--id-" data-method="DELETE"
      data-path="api/v1/patients/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-patients--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-patients--id-"
                    onclick="tryItOut('DELETEapi-v1-patients--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-patients--id-"
                    onclick="cancelTryOut('DELETEapi-v1-patients--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-patients--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/patients/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-patients--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-patients--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-v1-patients--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the patient. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-visits">GET api/v1/visits</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-visits">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/visits" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/visits"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-visits">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;draw&quot;: 0,
    &quot;recordsTotal&quot;: 12,
    &quot;recordsFiltered&quot;: 12,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;patient_id&quot;: 1,
            &quot;visit_date&quot;: &quot;2000-06-30&quot;,
            &quot;department&quot;: &quot;Poli Mata&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Dr. Rosa Walsh I&quot;,
            &quot;complaint&quot;: &quot;Sakit Kaki&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Fred Lowe&quot;,
            &quot;DT_RowIndex&quot;: 1
        },
        {
            &quot;id&quot;: 2,
            &quot;patient_id&quot;: 1,
            &quot;visit_date&quot;: &quot;1984-01-31&quot;,
            &quot;department&quot;: &quot;Poli Umum&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Bernice Luettgen&quot;,
            &quot;complaint&quot;: &quot;Batuk&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Fred Lowe&quot;,
            &quot;DT_RowIndex&quot;: 2
        },
        {
            &quot;id&quot;: 3,
            &quot;patient_id&quot;: 1,
            &quot;visit_date&quot;: &quot;2006-02-23&quot;,
            &quot;department&quot;: &quot;Poli Diabetes&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Pierce Reynolds&quot;,
            &quot;complaint&quot;: &quot;Flu&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Fred Lowe&quot;,
            &quot;DT_RowIndex&quot;: 3
        },
        {
            &quot;id&quot;: 4,
            &quot;patient_id&quot;: 1,
            &quot;visit_date&quot;: &quot;2000-02-26&quot;,
            &quot;department&quot;: &quot;Poli Umum&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Bernadine Romaguera&quot;,
            &quot;complaint&quot;: &quot;Sakit Kepala&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Fred Lowe&quot;,
            &quot;DT_RowIndex&quot;: 4
        },
        {
            &quot;id&quot;: 5,
            &quot;patient_id&quot;: 10,
            &quot;visit_date&quot;: &quot;1972-04-24&quot;,
            &quot;department&quot;: &quot;Poli Diabetes&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Andreane Mitchell&quot;,
            &quot;complaint&quot;: &quot;Demam&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Gunnar Mann V&quot;,
            &quot;DT_RowIndex&quot;: 5
        },
        {
            &quot;id&quot;: 6,
            &quot;patient_id&quot;: 4,
            &quot;visit_date&quot;: &quot;2018-01-20&quot;,
            &quot;department&quot;: &quot;Poli Jantung&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Alek Gusikowski&quot;,
            &quot;complaint&quot;: &quot;Hipertensi&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Dr. Germaine Watsica PhD&quot;,
            &quot;DT_RowIndex&quot;: 6
        },
        {
            &quot;id&quot;: 7,
            &quot;patient_id&quot;: 7,
            &quot;visit_date&quot;: &quot;1990-09-25&quot;,
            &quot;department&quot;: &quot;Poli Umum&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Selmer Swaniawski&quot;,
            &quot;complaint&quot;: &quot;Demam&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Larissa Hane&quot;,
            &quot;DT_RowIndex&quot;: 7
        },
        {
            &quot;id&quot;: 8,
            &quot;patient_id&quot;: 5,
            &quot;visit_date&quot;: &quot;1975-09-08&quot;,
            &quot;department&quot;: &quot;Poli Umum&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Briana Halvorson&quot;,
            &quot;complaint&quot;: &quot;Flu&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Donato Stehr&quot;,
            &quot;DT_RowIndex&quot;: 8
        },
        {
            &quot;id&quot;: 9,
            &quot;patient_id&quot;: 4,
            &quot;visit_date&quot;: &quot;2017-02-22&quot;,
            &quot;department&quot;: &quot;Poli Umum&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Ms. Caleigh Ebert&quot;,
            &quot;complaint&quot;: &quot;Sakit Kaki&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Dr. Germaine Watsica PhD&quot;,
            &quot;DT_RowIndex&quot;: 9
        },
        {
            &quot;id&quot;: 10,
            &quot;patient_id&quot;: 2,
            &quot;visit_date&quot;: &quot;2007-05-06&quot;,
            &quot;department&quot;: &quot;Poli Jantung&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Gino Bernhard II&quot;,
            &quot;complaint&quot;: &quot;Batuk&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Vanessa Ankunding&quot;,
            &quot;DT_RowIndex&quot;: 10
        },
        {
            &quot;id&quot;: 11,
            &quot;patient_id&quot;: 2,
            &quot;visit_date&quot;: &quot;2025-09-11&quot;,
            &quot;department&quot;: &quot;Poli Mata&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Pierce Reynolds&quot;,
            &quot;complaint&quot;: &quot;23131&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Vanessa Ankunding&quot;,
            &quot;DT_RowIndex&quot;: 11
        },
        {
            &quot;id&quot;: 12,
            &quot;patient_id&quot;: 2,
            &quot;visit_date&quot;: &quot;2025-09-13&quot;,
            &quot;department&quot;: &quot;Poli Umum&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Pierce Reynolds&quot;,
            &quot;complaint&quot;: &quot;sdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa123333333333333333wqeeeeeeeeeeeee&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;patient_name&quot;: &quot;Vanessa Ankunding&quot;,
            &quot;DT_RowIndex&quot;: 12
        }
    ],
    &quot;disableOrdering&quot;: false
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-visits" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-visits"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-visits"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-visits" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-visits">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-visits" data-method="GET"
      data-path="api/v1/visits"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-visits', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-visits"
                    onclick="tryItOut('GETapi-v1-visits');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-visits"
                    onclick="cancelTryOut('GETapi-v1-visits');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-visits"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/visits</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-visits"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-visits"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-visits">POST api/v1/visits</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-visits">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/visits" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"patient_id\": \"consequatur\",
    \"visit_date\": \"2020-01-10\",
    \"department\": \"consequatur\",
    \"doctor_name\": \"mqeopfuudtdsufvyvddqa\",
    \"complaint\": \"mniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvrbyickznkyglo\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/visits"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "patient_id": "consequatur",
    "visit_date": "2020-01-10",
    "department": "consequatur",
    "doctor_name": "mqeopfuudtdsufvyvddqa",
    "complaint": "mniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvrbyickznkyglo"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-visits">
</span>
<span id="execution-results-POSTapi-v1-visits" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-visits"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-visits"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-visits" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-visits">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-visits" data-method="POST"
      data-path="api/v1/visits"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-visits', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-visits"
                    onclick="tryItOut('POSTapi-v1-visits');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-visits"
                    onclick="cancelTryOut('POSTapi-v1-visits');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-visits"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/visits</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-visits"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-visits"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>patient_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="patient_id"                data-endpoint="POSTapi-v1-visits"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the patients table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>visit_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="visit_date"                data-endpoint="POSTapi-v1-visits"
               value="2020-01-10"
               data-component="body">
    <br>
<p>:Attribute bukan tanggal yang valid. :Attribute harus berisi tanggal sebelum <code>tomorrow</code>. Example: <code>2020-01-10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>department</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="department"                data-endpoint="POSTapi-v1-visits"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>doctor_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="doctor_name"                data-endpoint="POSTapi-v1-visits"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>:Attribute maksimal berisi 100 karakter. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>complaint</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="complaint"                data-endpoint="POSTapi-v1-visits"
               value="mniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvrbyickznkyglo"
               data-component="body">
    <br>
<p>:Attribute minimal berisi 5 karakter. Example: <code>mniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvrbyickznkyglo</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-visits--id-">GET api/v1/visits/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-visits--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/visits/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/visits/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-visits--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;patient_id&quot;: 1,
        &quot;visit_date&quot;: &quot;2000-06-30&quot;,
        &quot;department&quot;: &quot;Poli Mata&quot;,
        &quot;doctor_name&quot;: &quot;Dr. Dr. Rosa Walsh I&quot;,
        &quot;complaint&quot;: &quot;Sakit Kaki&quot;,
        &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
        &quot;updated_at&quot;: null,
        &quot;patient&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Fred Lowe&quot;,
            &quot;nik&quot;: &quot;6678134268753623&quot;,
            &quot;gender&quot;: &quot;P&quot;,
            &quot;birth_date&quot;: &quot;2021-05-13&quot;,
            &quot;phone&quot;: &quot;601.217.7975&quot;,
            &quot;address&quot;: &quot;91260 Dooley Branch\nSatterfieldville, PA 35966-7266&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-visits--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-visits--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-visits--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-visits--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-visits--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-visits--id-" data-method="GET"
      data-path="api/v1/visits/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-visits--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-visits--id-"
                    onclick="tryItOut('GETapi-v1-visits--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-visits--id-"
                    onclick="cancelTryOut('GETapi-v1-visits--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-visits--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/visits/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-visits--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-visits--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-visits--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the visit. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-visits--id-">PUT api/v1/visits/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-visits--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/v1/visits/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"patient_id\": \"consequatur\",
    \"visit_date\": \"2020-01-10\",
    \"department\": \"consequatur\",
    \"doctor_name\": \"mqeopfuudtdsufvyvddqa\",
    \"complaint\": \"mniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvrbyickznkyglo\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/visits/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "patient_id": "consequatur",
    "visit_date": "2020-01-10",
    "department": "consequatur",
    "doctor_name": "mqeopfuudtdsufvyvddqa",
    "complaint": "mniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvrbyickznkyglo"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-visits--id-">
</span>
<span id="execution-results-PUTapi-v1-visits--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-visits--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-visits--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-visits--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-visits--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-visits--id-" data-method="PUT"
      data-path="api/v1/visits/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-visits--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-visits--id-"
                    onclick="tryItOut('PUTapi-v1-visits--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-visits--id-"
                    onclick="cancelTryOut('PUTapi-v1-visits--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-visits--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/visits/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/visits/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-visits--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-visits--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-visits--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the visit. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>patient_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="patient_id"                data-endpoint="PUTapi-v1-visits--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the patients table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>visit_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="visit_date"                data-endpoint="PUTapi-v1-visits--id-"
               value="2020-01-10"
               data-component="body">
    <br>
<p>:Attribute bukan tanggal yang valid. :Attribute harus berisi tanggal sebelum <code>tomorrow</code>. Example: <code>2020-01-10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>department</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="department"                data-endpoint="PUTapi-v1-visits--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>doctor_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="doctor_name"                data-endpoint="PUTapi-v1-visits--id-"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>:Attribute maksimal berisi 100 karakter. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>complaint</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="complaint"                data-endpoint="PUTapi-v1-visits--id-"
               value="mniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvrbyickznkyglo"
               data-component="body">
    <br>
<p>:Attribute minimal berisi 5 karakter. Example: <code>mniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvrbyickznkyglo</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-visits--id-">DELETE api/v1/visits/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-visits--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/v1/visits/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/visits/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-visits--id-">
</span>
<span id="execution-results-DELETEapi-v1-visits--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-visits--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-visits--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-visits--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-visits--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-visits--id-" data-method="DELETE"
      data-path="api/v1/visits/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-visits--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-visits--id-"
                    onclick="tryItOut('DELETEapi-v1-visits--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-visits--id-"
                    onclick="cancelTryOut('DELETEapi-v1-visits--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-visits--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/visits/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-visits--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-visits--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-v1-visits--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the visit. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-patients--patient_id--visits">GET api/v1/patients/{patient_id}/visits</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-patients--patient_id--visits">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/patients/1/visits" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/patients/1/visits"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-patients--patient_id--visits">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 3,
            &quot;patient_id&quot;: 1,
            &quot;visit_date&quot;: &quot;2006-02-23&quot;,
            &quot;department&quot;: &quot;Poli Diabetes&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Pierce Reynolds&quot;,
            &quot;complaint&quot;: &quot;Flu&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Fred Lowe&quot;,
                &quot;nik&quot;: &quot;6678134268753623&quot;,
                &quot;gender&quot;: &quot;P&quot;,
                &quot;birth_date&quot;: &quot;2021-05-13&quot;,
                &quot;phone&quot;: &quot;601.217.7975&quot;,
                &quot;address&quot;: &quot;91260 Dooley Branch\nSatterfieldville, PA 35966-7266&quot;,
                &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
                &quot;updated_at&quot;: null
            }
        },
        {
            &quot;id&quot;: 1,
            &quot;patient_id&quot;: 1,
            &quot;visit_date&quot;: &quot;2000-06-30&quot;,
            &quot;department&quot;: &quot;Poli Mata&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Dr. Rosa Walsh I&quot;,
            &quot;complaint&quot;: &quot;Sakit Kaki&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Fred Lowe&quot;,
                &quot;nik&quot;: &quot;6678134268753623&quot;,
                &quot;gender&quot;: &quot;P&quot;,
                &quot;birth_date&quot;: &quot;2021-05-13&quot;,
                &quot;phone&quot;: &quot;601.217.7975&quot;,
                &quot;address&quot;: &quot;91260 Dooley Branch\nSatterfieldville, PA 35966-7266&quot;,
                &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
                &quot;updated_at&quot;: null
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;patient_id&quot;: 1,
            &quot;visit_date&quot;: &quot;2000-02-26&quot;,
            &quot;department&quot;: &quot;Poli Umum&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Bernadine Romaguera&quot;,
            &quot;complaint&quot;: &quot;Sakit Kepala&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Fred Lowe&quot;,
                &quot;nik&quot;: &quot;6678134268753623&quot;,
                &quot;gender&quot;: &quot;P&quot;,
                &quot;birth_date&quot;: &quot;2021-05-13&quot;,
                &quot;phone&quot;: &quot;601.217.7975&quot;,
                &quot;address&quot;: &quot;91260 Dooley Branch\nSatterfieldville, PA 35966-7266&quot;,
                &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
                &quot;updated_at&quot;: null
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;patient_id&quot;: 1,
            &quot;visit_date&quot;: &quot;1984-01-31&quot;,
            &quot;department&quot;: &quot;Poli Umum&quot;,
            &quot;doctor_name&quot;: &quot;Dr. Bernice Luettgen&quot;,
            &quot;complaint&quot;: &quot;Batuk&quot;,
            &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
            &quot;updated_at&quot;: null,
            &quot;patient&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Fred Lowe&quot;,
                &quot;nik&quot;: &quot;6678134268753623&quot;,
                &quot;gender&quot;: &quot;P&quot;,
                &quot;birth_date&quot;: &quot;2021-05-13&quot;,
                &quot;phone&quot;: &quot;601.217.7975&quot;,
                &quot;address&quot;: &quot;91260 Dooley Branch\nSatterfieldville, PA 35966-7266&quot;,
                &quot;created_at&quot;: &quot;2025-09-12 15:09:21&quot;,
                &quot;updated_at&quot;: null
            }
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost/api/v1/patients/1/visits?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost/api/v1/patients/1/visits?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Sebelumnya&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost/api/v1/patients/1/visits?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Berikutnya &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost/api/v1/patients/1/visits&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 4,
        &quot;total&quot;: 4
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-patients--patient_id--visits" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-patients--patient_id--visits"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-patients--patient_id--visits"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-patients--patient_id--visits" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-patients--patient_id--visits">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-patients--patient_id--visits" data-method="GET"
      data-path="api/v1/patients/{patient_id}/visits"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-patients--patient_id--visits', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-patients--patient_id--visits"
                    onclick="tryItOut('GETapi-v1-patients--patient_id--visits');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-patients--patient_id--visits"
                    onclick="cancelTryOut('GETapi-v1-patients--patient_id--visits');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-patients--patient_id--visits"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/patients/{patient_id}/visits</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-patients--patient_id--visits"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-patients--patient_id--visits"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patient_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patient_id"                data-endpoint="GETapi-v1-patients--patient_id--visits"
               value="1"
               data-component="url">
    <br>
<p>The ID of the patient. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
