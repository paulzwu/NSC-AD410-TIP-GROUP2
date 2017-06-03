package com.mahiltletdan.hw1;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;


/**
 * Created by Mahilet  on 4/22/17.
 */


public class CustomRecyclerAdapter extends RecyclerView.Adapter
        <CustomRecyclerAdapter.ViewHolder>{

    String[][] movies;
    Context context;
    View view1;
    ViewHolder viewHolder1;


    public CustomRecyclerAdapter(Context context1, String[][] myMovies){
        movies= myMovies ;
        context = context1;

    }

    public class ViewHolder extends RecyclerView.ViewHolder{
        public TextView titleText;
        public TextView categoryText;
        public ViewHolder(View v) {
            super(v);
            titleText = (TextView) v.findViewById(R.id.titleView);
            categoryText = (TextView) v.findViewById(R.id.categoryView);
        }
    }

    @Override
    public CustomRecyclerAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType){

        view1 = LayoutInflater.from(context).inflate(R.layout.activity_recycler_view, parent, false);

        viewHolder1 = new ViewHolder(view1);

        return viewHolder1;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position){

        holder.titleText.setText(movies[position][0]);
        holder.categoryText.setText(movies[position][1]);
    }

    @Override
    public int getItemCount(){

        return movies.length;
    }


}
