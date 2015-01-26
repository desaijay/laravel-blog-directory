@extends('layout.main')
@section('title','post tables')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Posts</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color:red">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>@foreach($posts as $post)
                                        <tr class="odd gradeX">
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->content}}</td>
                                            <td class="center"><a href="{{URL::route('geteditpost', $post->id)}}">Edit</a></td>
                                            <td class="center"><a href="{{URL::route('deletepost', $post->id)}}">Delete</a></td>
                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
@stop
@stop