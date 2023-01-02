{{$project->title}}
{{$project->projectDetails->count()}}
<form action="{{secure_url("assign/$project->id")}}" method="post">
    @csrf
    <input type="submit" value="Submit">
</form>
