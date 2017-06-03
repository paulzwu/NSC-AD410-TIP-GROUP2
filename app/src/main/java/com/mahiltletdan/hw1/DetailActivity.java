package com.mahiltletdan.hw1;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.widget.TextView;

/**
 * Created by Mahilet
 * on 4/15/17.
 */


public class DetailActivity extends AppCompatActivity {
    private static final String TAG= DetailActivity.class.getSimpleName();



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);

        //Main App Menu
        Toolbar ToolBar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(ToolBar);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);



        if (savedInstanceState != null) {
            Log.d(TAG, "onCreate() Restoring previous state");
            /* restore state */
        } else {
            Log.d(TAG, "onCreate() No saved state available");
            /* initialize app */
        }

        // Get the Intent that started this activity and extract the string
        Intent intent = getIntent();
        String myDetail=   intent.getStringExtra(MainActivity.MESSAGE_TO_PASS);
        // Capture the layout's TextView and set the string as its text
        TextView myReceiver =(TextView) findViewById(R.id.receiver);
        //create a new TextView object
        myReceiver.setText(myDetail);

        //append state name with TextView static text

        Log.d(TAG, "onCreate()");


    }



    @Override
    protected void onStart(){
        super.onStart();
        Log.d(TAG, "onStart()");
    }

    @Override
    protected void onResume(){
        super.onResume();
        Log.d(TAG, "onResume()");
    }


    @Override
    protected void onPause(){
        super.onPause();
        Log.d(TAG, "onPause()");
    }


    @Override
    protected void onStop(){
        super.onStop();
        Log.d(TAG, "onStop()");
    }


    @Override
    protected void onDestroy(){
        super.onDestroy();
        Log.d(TAG, "onDestroy()");
    }

    @Override
    protected void onRestart(){
        super.onRestart();
        Log.d(TAG, "onRestart()");
    }

    /**
     * Created by brikinesh on 6/1/2017.
     */

    public static class Constants {
    }
}
