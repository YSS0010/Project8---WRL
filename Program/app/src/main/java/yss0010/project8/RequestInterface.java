package yss0010.project8;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.POST;
import yss0010.project8.models.ServerRequest;
import yss0010.project8.models.ServerResponse;

/**
 * Created by Ysmael_2 on 29/11/2017.
 */

public interface RequestInterface {

    @POST("project8/")
    Call<ServerResponse> operation(@Body ServerRequest request);

}