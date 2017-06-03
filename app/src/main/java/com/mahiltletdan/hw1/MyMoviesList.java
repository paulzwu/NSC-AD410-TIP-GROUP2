package com.mahiltletdan.hw1;

import android.content.Context;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class MyMoviesList extends AppCompatActivity {

    Context context;
    RecyclerView recyclerView;
    RecyclerView.Adapter recyclerViewAdapter;
    RecyclerView.LayoutManager recylerViewLayoutManager;
//
//    String[][] movies = {
//            {"Mad Max: Fury Road", "Action & Adventure"},
//            {"Inside Out", "Animation, Kids & Family"},
//            {"Shaun the Sheep", "Animation"},
//            {"The Martian", "Science Fiction & Fantasy"},
//            {"Mission: Impossible Rogue Nation", "Action"},
//            {"Up", "Animation", "Star Trek"},
//            {"Science Fiction", "The LEGO Movie"},
//            {"Animation", "Iron Man", "Action & Adventure", },
//            {"Aliens", "Science Fiction"},
//            {"Chicken Run", "Animation"},
//            {"Back to the Future", "Science Fiction"},
//            {"Raiders of the Lost Ark", "Action & Adventure"},
//            {"Goldfinger", "Action & Adventure"},
//            {"Guardians of the Galaxy", "Science Fiction & Fantasy"},
//            {"Mad Max: Fury Road", "Action & Adventure"},
//           {"Inside Out", "Animation, Kids & Family"},
//
//
//    };

    String[][] movies = new String[16][2];
    String url = "http://mahitletdan.com/MobileApp/ad340/myjson.json";

    String TAG = "MOVIES";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
    //    requestWindowFeature(Window.FEATURE_ACTION_BAR);
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_my_movies_list);

        final TextView mTxtDisplay = (TextView) findViewById(R.id.json_text);

        Toolbar toolBar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolBar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        context = getApplicationContext();

        recyclerView = (RecyclerView) findViewById(R.id.recyclerView1);
        recylerViewLayoutManager = new LinearLayoutManager(context);

        recyclerView.setLayoutManager(recylerViewLayoutManager);
        recyclerViewAdapter = new CustomAdapter();
       recyclerView.setAdapter(recyclerViewAdapter);




        RequestQueue queue = Volley.newRequestQueue(this);
        JsonArrayRequest jsonReq = new JsonArrayRequest(url, new Response.Listener<JSONArray>() {

            @Override
            public void onResponse(JSONArray response) {

                Log.d(TAG, "JSON onResponse started");
                Log.d(TAG, response.toString());

                try {
//                    int total = response.length();
                    String moviesJson = "";

                    for (int i = 0; i < response.length(); i++) {
                        JSONObject JO = response.getJSONObject(i);
                        String titleString = JO.getString("title");
                        String categoryString = JO.getString("genre");
                        movies[i][0] = titleString;
                        movies[i][1] = categoryString;
                        moviesJson += titleString + " ";
                        moviesJson += categoryString;

                    }
                    recyclerViewAdapter.notifyDataSetChanged();

                    mTxtDisplay.setText(moviesJson);


                } catch (JSONException e) {
                    Log.d(TAG, "JSON Error: " + e.getMessage());
                    e.getStackTrace();
                }

            }
        },  new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.d("JSON", "Error: " + error.getMessage());
            }
        });
        // Add the request to the RequestQueue.
        queue.add(jsonReq);

    };


    public class CustomAdapter extends RecyclerView.Adapter<CustomAdapter.ViewHolder> {

        public class ViewHolder extends RecyclerView.ViewHolder {
            // each data item is just a string in this case

            public TextView titleText;
            public TextView categoryText;

            public ViewHolder(View v) {
                super(v);
                titleText = (TextView) v.findViewById(R.id.titleView);
                categoryText = (TextView) v.findViewById(R.id.categoryView);
            }
        }


        @Override
        public CustomAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {

            // Inflate the view for this view holder
            View item = getLayoutInflater().inflate(R.layout.activity_recycler_view, parent,
                    false);

            // Call the view holder's constructor, and pass the view to it;
            // return that new view holder
            ViewHolder vh = new ViewHolder(item);
            return vh;
        }

        @Override
        public void onBindViewHolder(ViewHolder holder, int position) {

            holder.titleText.setText(movies[position][0]);
            holder.categoryText.setText(movies[position][1]);
        }

        @Override
        public int getItemCount() {

            return movies.length;
        }

    }

    /**
     * Created by brikinesh on 6/1/2017.
     */

    public static class Constants {
    }
}

