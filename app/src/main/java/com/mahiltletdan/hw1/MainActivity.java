package com.mahiltletdan.hw1;

import android.app.Dialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.app.DialogFragment;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.view.WindowManager;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.GridView;
import android.widget.Toast;

import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.GoogleApiAvailability;

import java.io.IOException;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {
    //define MESSAGE_TO_PASS String
    public static String MESSAGE_TO_PASS = "package com.mahiltletdan.hw1;";
    private static final String TAG= "AD340";
    private static final int PLAY_SERVICES_RESOLUTION_REQUEST = 9000;


    EditText myEditText;
    Button mButton;

    /**
     * Called when the user taps the Send button
     */

      // Array of strings...
    String[] buttonsArray = {"TL", "TR", "BL", "BR" };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Log.d(TAG, "onCreate() Main created");

        getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_HIDDEN);


        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        mButton = (Button) findViewById(R.id.button);

        mButton.setOnClickListener(this);

        try {
            if (isConnected() == true) {
                Toast.makeText(MainActivity.this, "You are connected",
                        Toast.LENGTH_LONG).show();

            }else {
                Toast.makeText(MainActivity.this, "You are not connected",
                        Toast.LENGTH_LONG).show();
            }
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }


        GridView gridview = (GridView) findViewById(R.id.gridview);
        gridview.setAdapter(new ButtonAdapter(this));


        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final AlertDialog.Builder myBuilder = new AlertDialog.Builder(MainActivity.this);
                myBuilder.setIcon(android.R.drawable.ic_menu_preferences);
                myBuilder.setTitle(R.string.main_dialog_title);
                myBuilder.setMessage(R.string.main_dialog_title)
                        .setPositiveButton(R.string.dialog_yes, new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {
                                Log.d(TAG, "user answered yes");

                            }
                        })
                        .setNegativeButton(R.string.dialog_no, new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {
                                Log.d(TAG, "user answered no");
                            }
                        });

                myBuilder.setCancelable(false);
                AlertDialog alertDialog = myBuilder.create();
                alertDialog.show();

            }

         ;
        });

    }

    private boolean isConnected() throws InterruptedException, IOException
    {
        String command = "ping -c 1 google.com";
        return (Runtime.getRuntime().exec (command).waitFor() == 0);
    } {
    }


    @Override
    public void onClick(View v) {
        Button btn = (Button) v;


        Log.d("CLICK", "clicked button");
        if(btn.getId() == R.id.button){
            myEditText = (EditText) findViewById(R.id.message);
            String message = myEditText.getText().toString();
            Intent intent = new Intent(this, DetailActivity.class);
            intent.putExtra(MESSAGE_TO_PASS, message);
            startActivity(intent);

        }else {
          makeToast(btn.getText().toString());
        }
    }

    private void makeToast(String text){
        Toast.makeText(getApplicationContext(), text, Toast.LENGTH_SHORT).show();
    }

    public void sendMessage(View view) {
        Intent intent = new Intent(this, DetailActivity.class);
        EditText editText = (EditText) findViewById(R.id.message);
        String message = editText.getText().toString();
        intent.putExtra(MESSAGE_TO_PASS, message);
        startActivity(intent);


    }

    public class ButtonAdapter extends BaseAdapter {
        private Context mContext;

        public ButtonAdapter(Context c) {
            mContext = c;
        }

        public int getCount() {
            return buttonsArray.length;
        }

        public Object getItem(int position) {
            return null;
        }

        public long getItemId(int position) {
            return 0;
        }

        // create a new ImageView for each item referenced by the Adapter
        public View getView(int position, View convertView, ViewGroup parent) {
            Button button;
            if (convertView == null) {
                // if it's not recycled, initialize some attributes
                button = new Button(mContext);
            } else {
                button = (Button) convertView;
            }

            button.setText(buttonsArray[position]);
            button.setId(position);
            button.setOnClickListener(new BtnOnClickListener());
            //button.setOnClickListener(new BtnOnClickListener(position));

            button.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    if(v.getId() == 0){
                        Intent intent = new Intent(mContext, MyMoviesList.class);
                        mContext.startActivity(intent);
                    } else {
                        Toast.makeText(mContext, "" + v.getId(),
                                Toast.LENGTH_SHORT).show();
                    }

                }
            });

            //button.setOnClickListener(new BtnOnClickListener(position));
            return button;
        }

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater  menuInflater = getMenuInflater();
        menuInflater.inflate(R.menu.my_app_menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item
        if (item.getItemId() == R.id.home) {
            Intent intent = new Intent(this, MainActivity.class);
            startActivity(intent);
        }
        if (item.getItemId() == R.id.action_about) {
            Intent intent = new Intent(this, AboutActivity.class);
            startActivity(intent);
        }
        if (item.getItemId() == R.id.action_movie_list) {
            Intent intent = new Intent(this, MyMoviesList.class);
            startActivity(intent);
        }
            if (item.getItemId() == R.id.map) {
                Intent intent = new Intent(this, MapActivity.class);
                startActivity(intent);
        }
        return super.onOptionsItemSelected(item);
    }
//fab

    class BtnOnClickListener implements View.OnClickListener
    {

        public void onClick(View v)
        {
            Log.d(TAG, "tapped button");
            showList(v.getId());

            int id = v.getId();
            switch (id) {
                case 0:
                    Intent intentL = new Intent(getBaseContext(), MyMoviesList.class);
                    startActivity(intentL);
                    break;
                case 1:
                    Intent intentR = new Intent(getBaseContext(), CustomRecyclerAdapter.class);
                    startActivity(intentR);
                    break;
                case 2:
                    Intent intentM = new Intent(getBaseContext(), AboutActivity.class);
                    startActivity(intentM);
                    break;
                case 3:
                    Intent intentN = new Intent(getBaseContext(), MapActivity.class);
                    startActivity(intentN);
                    break;
                default:
                    Button b = (Button) v;
                    String label = b.getText().toString();
                    Toast.makeText(MainActivity.this, label,
                            Toast.LENGTH_SHORT).show();
                    break;
            }
        }
    }

    public void showList(int id){
        if (id==0){
            Intent recycle = new Intent(this, CustomRecyclerAdapter.class);
            startActivity(recycle);
        }else if(id==1){
            DialogFragment newFragment = new CustomDialogFragment();
            newFragment.show(getSupportFragmentManager(), "main_dialog");
        }else {
            Toast.makeText(MainActivity.this, "" + id,
                    Toast.LENGTH_SHORT).show();
        }
    }



    public static class CustomDialogFragment extends DialogFragment {
        @Override
        public View onCreateView(LayoutInflater inflater, ViewGroup container,
                                 Bundle savedInstanceState) {

            return inflater.inflate(R.layout.main_dialog, container, false);
        }


        @Override
        public Dialog onCreateDialog(Bundle savedInstanceState) {
            // Use the Builder class for convenient dialog construction
            AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
            builder.setMessage(R.string.main_dialog_title)
                    .setPositiveButton(R.string.dialog_yes, new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {
                            Log.d(TAG, "user answered yes");
                        }
                    })
                    .setNegativeButton(R.string.dialog_no, new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {
                            Log.d(TAG, "user answered no");
                        }
                    });
            // Create the AlertDialog object and return it
            return builder.create();
        }

    }
    /**
     * Check the device to make sure it has the Google Play Services APK. If
     * it doesn't, display a dialog that allows users to download the APK from
     * the Google Play Store or enable it in the device's system settings.
     */


    private boolean checkPlayServices() {
        GoogleApiAvailability apiAvailability = GoogleApiAvailability.getInstance();
        int resultCode = apiAvailability.isGooglePlayServicesAvailable(this);
        if (resultCode != ConnectionResult.SUCCESS) {
            if (apiAvailability.isUserResolvableError(resultCode)) {
                apiAvailability.getErrorDialog(this, resultCode, PLAY_SERVICES_RESOLUTION_REQUEST)
                        .show();
            } else {
                Log.i(TAG, "This device is not supported.");
                finish();
            }
            return false;
        }
        return true;
    }

}


