<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Orgs Orderpang LineOA</title>

        <!-- Disable Google Bot -->
        <meta name="Googlebot-News" content="noindex, nofollow">
        <meta name="googlebot" content="noindex, nofollow">
        <meta name="robots" content="noindex, nofollow">
        <meta name="robots" content="noimageindex">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <!-- Bootstrap 4.3 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="relative items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
                @include('flash-message')
                <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addOrgModal">
                    เพิ่ม Org
                </button>
                <a href="{{ url('/orgs/restore') }}" class="btn btn-info my-3">
                    กู้คืน Org
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">orgid</th>
                            <th scope="col">name</th>
                            <th scope="col">line_notify_token</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orgs as $key=>$org)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $org->orgid }}</td>
                            <td>{{ $org->name }}</td>
                            <td>{{ $org->line_notify_token }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm mr-2" data-toggle="modal" data-target="#editOrgModal" onClick="setOrgData('{{ $org->id }}', '{{ $org->orgid }}', '{{ $org->name }}', '{{ $org->line_notify_token }}')">แก้ไข</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#inactiveOrgModal" onClick="setOrgDelete('{{ $org->id }}', '{{ $org->orgid }}', '{{ $org->name }}')">X</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Create Org -->
            <div class="modal fade" id="addOrgModal" tabindex="-1" role="dialog" aria-labelledby="addOrgModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addOrgModalLabel">เพิ่ม Org</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ url('/org-create') }}">
                            @csrf
                                <div class="form-group">
                                    <label for="orgid">orgid <small class="text-danger">*</small></label>
                                    <input required type="text" class="form-control" id="orgid" name="orgid">
                                </div>
                                <div class="form-group">
                                    <label for="name">name <small class="text-danger">*</small></label>
                                    <input required type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="line_notify_token">line notify token</label>
                                    <textarea class="form-control" id="line_notify_token" name="line_notify_token"></textarea>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Org -->
            <div class="modal fade" id="editOrgModal" tabindex="-1" role="dialog" aria-labelledby="editOrgModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editOrgModalLabel">แก้ไข Org</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ url('/org-edit') }}">
                            @csrf
                                <div class="form-group">
                                    <label for="e_orgid">orgid <small class="text-danger">*</small></label>
                                    <input required type="text" class="form-control" id="e_orgid" name="e_orgid" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="e_name">name <small class="text-danger">*</small></label>
                                    <input required type="text" class="form-control" id="e_name" name="e_name">
                                </div>
                                <div class="form-group">
                                    <label for="e_line_notify_token">line notify token</label>
                                    <textarea class="form-control" id="e_line_notify_token" name="e_line_notify_token"></textarea>
                                </div>
                                <input type="hidden" id="e_id" name="id" value="">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- INACTIVE Org -->
            <div class="modal fade" id="inactiveOrgModal" tabindex="-1" role="dialog" aria-labelledby="inactiveOrgModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inactiveOrgModalLabel">ยืนยันการปิด Org <span id="close_org_1"></span>?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ url('/org-delete') }}">
                            @csrf
                                <center>
                                    <h3>ยืนยันการปิดการใช้งาน<br/> orgid : <span id="close_org_2"></span>?</h3>
                                </center>
                                <br/><br/>
                                <input type="hidden" id="d_id" name="id" value="">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>

<script>
    function setOrgData(id, orgid, name, token) {
        document.querySelector('#e_id').value = id
        document.querySelector('#e_orgid').value = orgid
        document.querySelector('#e_name').value = name
        document.querySelector('#e_line_notify_token').value = token
    }

    function setOrgDelete(id, orgid, name) {
        document.querySelector('#d_id').value = id
        document.querySelector('#close_org_1').innerHTML = name
        document.querySelector('#close_org_2').innerHTML = orgid
    }
</script>