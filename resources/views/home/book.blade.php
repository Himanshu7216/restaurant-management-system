<div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
            <h2 class="section-title mb-5">BOOK A TABLE</h2>

            <form action="{{url('book_table')}}" method="post">
                @csrf

                <div class="row justify-content-center mb-5 g-3">
                    <div class="col-md col-sm-6">
                        <input type="text" name="name" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="Name">
                    </div>
                    <div class="col-md col-sm-6">
                        <input type="text" name="phone" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="Phone Number">
                    </div>
                    <div class="col-md col-sm-6">
                        <input type="number" name="n_guest" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="No. Of Guests">
                    </div>
                    <div class="col-md col-sm-6">
                        <input type="time" name="time" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="Time">
                    </div>
                    <div class="col-md col-sm-6">
                        <input type="date" name="date" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="Date">
                    </div>
                </div>

                <input type="submit" class="btn btn-lg btn-primary" id="rounded-btn" value="Book Table" />
                
            </form>
        </div>
    </div>