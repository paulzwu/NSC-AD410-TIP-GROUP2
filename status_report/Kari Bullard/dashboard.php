<!-- <!DOCTYPE html>
<html>
<head>
</head>

<body> -->
<!-- Main Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">TIP Submission Rates</h4>
                        <p class="category">Total Responses Expected: <?php echo $totalFaculty ?></p>
                        <p class="category">Waiting On: <?php echo $waitingOn ?></p>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                                <div id="complete" class="gauge"></div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                                <div id="inprogress" class="gauge"></div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                                <div id="notstarted" class="gauge"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table id="table_id" class="display "></table>
        </div>
        </div>


<script>

    $(document).ready(function() {
        $('#table_id').DataTable({
            "processing" : true,
            "ajax" : {
                url : "movies.json",
                dataSrc : function(data) {
                    var dataTable = [];
                    for (i = 0; i < data.length; i++) {
                        dataTable.push([data[i].movie, data[i].year, data[i].url]);

                    }
                    return dataTable
                }
            },

            columns: [
                { data: 0, title: 'Movie'},
                { data: 1, title: 'Year'},
                { data: 2, title: 'Link',
                    "render": function(data, type){
                        if(type === 'display'){
                            data = '<a href="' + data + '" target="_blank">' + data + '</a>';
                        }

                        return data;
                    }
                }
            ]
        });
    });
</script>
</body>
</html>



