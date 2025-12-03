<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <base href="/public">
    
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
    </style>

    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->

        @include('admin.sidebar')
      
        <!-- partial -->

        @include('admin.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" style="padding-top: 20px;">
            @if(session()->has('message'))

            <div class="alert alert-success" style="position: absolute; top:5em;">   
                <button type="button" class="close" data-dismiss="alert"> x </button>   
                {{session()->get('message')}}
            </div>
            @endif
            <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Save Button at Top -->
                <div style="padding: 15px; background-color: #f8f9fa; border: 2px solid #007bff; border-radius: 5px; margin-bottom: 20px;">
                    <button type="submit" class="btn btn-primary btn-lg" style="font-size: 18px; padding: 15px 40px; font-weight: bold;">
                        💾 SAVE DOCTOR DETAILS
                    </button>
                    <span style="margin-left: 20px; color: #007bff; font-weight: bold;">Click here to save all changes</span>
                </div>

                <div style="padding: 15px;">
                    <label>Doctor Name</label>
                    <input type="text" style="color: black;" name="name" value="{{$data->name}}">
                </div>

                <div style="padding: 15px;">
                    <label>Phone</label>
                    <input type="number" style="color: black;" name="number" value="{{$data->phone}}">
                </div>

                <div style="padding: 15px;">
                    <label>Speciality</label>
                    <select name="speciality" style="color: black; width: 200px;">
                        <option value="skin" {{ $data->speciality == 'skin' ? 'selected' : '' }}>skin</option>
                        <option value="orthopaedic" {{ $data->speciality == 'orthopaedic' ? 'selected' : '' }}>orthopaedic</option>
                        <option value="paediatric" {{ $data->speciality == 'paediatric' ? 'selected' : '' }}>paediatric</option>
                        <option value="heart" {{ $data->speciality == 'heart' ? 'selected' : '' }}>heart</option>
                        <option value="optician" {{ $data->speciality == 'optician' ? 'selected' : '' }}>optician</option>
                    </select>
                </div>

                <div style="padding: 15px;">
                    <label>Room Number</label>
                    <input type="text" style="color: black;" name="room" value="{{$data->room}}">
                </div>

                <div style="padding: 15px;">
                    <label>Education & Qualifications</label>
                    <textarea style="color: black; width: 400px; height: 100px;" name="education" placeholder="Enter doctor's education and qualifications">{{$data->education}}</textarea>
                </div>

                <div style="padding: 15px;">
                    <label>Years of Experience</label>
                    <input type="number" style="color: black;" name="experience_years" value="{{$data->experience_years}}" placeholder="Enter years of experience">
                </div>

                <div style="padding: 15px;">
                    <label>Biography</label>
                    <textarea style="color: black; width: 400px; height: 150px;" name="biography" placeholder="Enter doctor's biography">{{$data->biography}}</textarea>
                </div>

                <div style="padding: 15px;">
                    <label>Languages Spoken</label>
                    <input type="text" style="color: black; width: 400px;" name="languages" value="{{$data->languages}}" placeholder="e.g., English, Spanish, French">
                </div>

                <div style="padding: 15px;">
                    <label>Certifications</label>
                    <textarea style="color: black; width: 400px; height: 100px;" name="certifications" placeholder="Enter doctor's certifications">{{$data->certifications}}</textarea>
                </div>

                <div style="padding: 15px;">
                    <label>Awards & Recognition</label>
                    <textarea style="color: black; width: 400px; height: 100px;" name="awards" placeholder="Enter doctor's awards and recognition">{{$data->awards}}</textarea>
                </div>

                <div style="padding: 15px;">
                    <label>Working Hours</label>
                    <textarea style="color: black; width: 400px; height: 80px;" name="working_hours" placeholder="e.g., Mon-Fri: 9AM-5PM, Sat: 9AM-1PM">{{$data->working_hours}}</textarea>
                </div>

                <div style="padding: 15px;">
                    <label>Address</label>
                    <textarea style="color: black; width: 400px; height: 80px;" name="address" placeholder="Enter doctor's address">{{$data->address}}</textarea>
                </div>

                <div style="padding: 15px;">
                    <label>Old Image</label>
                    <img height="150" width="150" src="doctorimage/{{$data->image}}">
                </div>

                <div style="padding: 15px;">
                    <label>Change Image</label>
                    <input type="file" name="file">
                </div>

                <!-- Save Button at Bottom -->
                <div style="padding: 20px; background-color: #f8f9fa; border: 2px solid #28a745; border-radius: 5px; margin-top: 30px;">
                    <button type="submit" class="btn btn-success btn-lg" style="font-size: 18px; padding: 15px 40px; font-weight: bold;">
                        ✅ SAVE ALL CHANGES
                    </button>
                    <span style="margin-left: 20px; color: #28a745; font-weight: bold;">Don't forget to save your changes!</span>
                </div>
            </form>

            </div>
            
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>