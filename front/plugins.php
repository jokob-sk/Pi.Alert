<?php

  require 'php/templates/header.php';
?>

<script src="js/pialert_common.js"></script>

<!-- Page ------------------------------------------------------------------ -->
<div class="content-wrapper">

    <!-- Content header--------------------------------------------------------- -->
    <section class="content-header">
        <?php require 'php/templates/notification.php'; ?>
        <h1 id="pageTitle">
            <i class="fa fa-fw fa-plug"></i> <?= lang('Navigation_Plugins');?>
            <span class="pageHelp"> <a target="_blank" href="https://github.com/jokob-sk/Pi.Alert/tree/main/front/plugins"><i class="fa fa-circle-question"></i></a><span>
        </h1>    
    </section>

    <!-- Main content ---------------------------------------------------------- -->
    <section class="content">
        <div class="nav-tabs-custom" style="margin-bottom: 0px;">
            <ul id="tabs-location" class="nav nav-tabs">
                <!-- PLACEHOLDER -->
            </ul>  
        <div id="tabs-content-location" class="tab-content"> 
            <!-- PLACEHOLDER -->
        </div>   
        
    </section>    
</div>

<?php
  require 'php/templates/footer.php';
?>

<script defer>

// -----------------------------------------------------------------------------
// Get translated string
function localize (obj, key) {

    currLangCode = getCookie("language")

    result = ""
    en_us = ""

    if(obj.localized && obj.localized.includes(key))
    {
        for(i=0;i<obj[key].length;i++)
        {
            code = obj[key][i]["language_code"]

            console.log(code)

            if( code == 'en_us')
            {
                en_us = obj[key][i]["string"]
            }

            if(code == currLangCode)
            {
                result = obj[key][i]["string"]
            }

        }
    }

    result == "" ? en_us : result ;

    return result;
}

// -----------------------------------------------------------------------------
pluginDefinitions = []
pluginUnprocessedEvents = []

function getData(){

    $.get('api/plugins.json', function(res) {    
        
        pluginDefinitions = res["data"];

        $.get('api/table_plugins_unprocessed_entries.json', function(res) {

            pluginUnprocessedEvents = res["data"];

            generateTabs()
        });

    });
}

// -----------------------------------------------------------------------------
function generateTabs()
{
    activetab = 'active'

    $.each(pluginDefinitions, function(index, obj) {
        $('#tabs-location').append(
            `<li class="${activetab}">
                <a href="#${obj.unique_prefix}" data-plugin-prefix="${obj.unique_prefix}" id="${obj.unique_prefix}_id" data-toggle="tab" >
                ${localize(obj, 'icon')} ${localize(obj, 'display_name')}
                </a>
            </li>`
        );
        activetab = '' // only first tab is active
    });

    activetab = 'active'
    
    $.each(pluginDefinitions, function(index, obj) {

        headersHtml = ""
        headers = []
        rows = ""

        // Generate the header
        $.each(obj["database_column_aliases"]["localized"], function(index, locItem){
            headers.push(locItem)
            headersHtml += `<th class="col-sm-2" >${localize(obj["database_column_aliases"], locItem )}</th>`

        });

        // Generate the entry rows
        for(i=0;i<pluginUnprocessedEvents.length;i++)
        {
            if(pluginUnprocessedEvents[i].Plugin == obj.unique_prefix)
            {
                clm = ""

                for(j=0;j<headers.length;j++) 
                {   
                    clm += '<td>'+ pluginUnprocessedEvents[i][headers[j]] +'</td>'
                }                   
                rows += '<tr>' + clm + '</tr>'
            }            
        }


        $('#tabs-content-location').append(
            `    
            <div id="${obj.unique_prefix}" class="tab-pane ${activetab}"> 
                <div>
                    <a href="https://github.com/jokob-sk/Pi.Alert/tree/main/front/plugins/${obj.code_name}" target="_blank"><?= lang('Gen_Help');?></a>
                </div>
                ${localize(obj, 'description')} 
                <h5>
                    <i class="fa fa-clock"></i> <?= lang('Plugins_Unprocessed_Events');?> 
                </h5>
                <hr>
            
                <table class="table table-striped">
                
                    <tbody>
                        <tr>
                            ${headersHtml}                            
                        </tr>  
                        ${rows}
                    </tbody>
                </table>
            </div>
        `);

        activetab = '' // only first tab is active
    });
}

// -----------------------------------------------------------------------------

getData()

</script>


