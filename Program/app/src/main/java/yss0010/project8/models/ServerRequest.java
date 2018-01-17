package yss0010.project8.models;

/**
 * Created by Ysmael_2 on 29/11/2017.
 */

public class ServerRequest {

    private String operation;
    private User user;

    public void setOperation(String operation) {
        this.operation = operation;
    }

    public void setUser(User user) {
        this.user = user;
    }
}