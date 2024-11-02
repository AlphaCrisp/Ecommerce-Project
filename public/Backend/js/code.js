$(function(){
    $(document).on('click','#delete', function(e){
        e.preventDefault();
        var link = $(this).attr("href");


            Swal.fire({
                title: 'Are You Sure?',
                text: "Delete This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Your File has been deleted',
                        'success'
                    )
                }
            })
    });
});

//CONFIRM
$(function(){
    $(document).on('click','#confirm', function(e){
        e.preventDefault();
        var link = $(this).attr("href");


            Swal.fire({
                title: 'Are You Sure to Confirm?',
                text: "Once Confirm, You Will Not be Able to Pending Again",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Confirm it!'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = link
                    Swal.fire(
                        'Confirm!',
                        'Confirm Changes',
                        'success'
                    )
                }
            })
    });
});

//Processing
$(function(){
    $(document).on('click','#processing', function(e){
        e.preventDefault();
        var link = $(this).attr("href");


            Swal.fire({
                title: 'Are You Sure Want to Process?',
                text: "Once Processing, You Will Not be Able to Confirm Again",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Process it!'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = link
                    Swal.fire(
                        'Process!',
                        'Process Changes',
                        'success'
                    )
                }
            })
    });
});

//PICKED
$(function(){
    $(document).on('click','#picked', function(e){
        e.preventDefault();
        var link = $(this).attr("href");


            Swal.fire({
                title: 'Are You Sure Want to Pick?',
                text: "Once Picked, You Will Not be Able to Process Again",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Pick it!'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = link
                    Swal.fire(
                        'Pick!',
                        'Pick Changes',
                        'success'
                    )
                }
            })
    });
});

//SHIPPED
$(function(){
    $(document).on('click','#shipped', function(e){
        e.preventDefault();
        var link = $(this).attr("href");


            Swal.fire({
                title: 'Are You Sure Want to Ship?',
                text: "Once Shipped, You Will Not be Able to Pick Again",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Ship it!'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = link
                    Swal.fire(
                        'Ship!',
                        'Ship Changes',
                        'success'
                    )
                }
            })
    });
});

//DELIVERED
$(function(){
    $(document).on('click','#delivered', function(e){
        e.preventDefault();
        var link = $(this).attr("href");


            Swal.fire({
                title: 'Are You Sure Want to Deliver?',
                text: "Once Delivered, You Will Not be Able to Ship Again",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Deliver it!'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = link
                    Swal.fire(
                        'Deliver!',
                        'Deliver Changes',
                        'success'
                    )
                }
            })
    });
});