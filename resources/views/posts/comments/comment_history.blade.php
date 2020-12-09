<?php

dump($posts['commentauthor']);

?>

<div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
            <strong>No of comments - {{count($posts['commentpost'])}}</strong>            
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">           
                
            <strong>Comments History</strong>          

            <table class="table table-hover table-condensed">
                <thead class="thead-dark">
                <th class="text-center">Subtitle</th>
                <th class="text-center">Comment</th>
                <th class="text-center">Written At/By</th>      
                </thead>
            @foreach ($posts['commentpost'] as $key => $comment)
            <tr>
                <td class="text-center">{{ $comment->subtitle }}</td>

                        
                <td class="clickable text-center"> 
                {{ $comment->content }}
                </td>

            
                <td class="text-center">
                    {{ $comment->created_at }}
                    {{ $comment->author_id }}
                </td>            
                            
            </tr>
            
            @endforeach
            </table>           
        
            </div>
        </div>
    </div>

   