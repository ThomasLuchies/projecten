package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.Rook;
import Chess.Core.Color;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Map;

public class ListAvailableKingMoves extends ListAvailableMoves
{
    @Override
    public HashSet<Coords> list(Board board, Coords location) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        int x;
        int y;
        HashSet<Coords> availableMoves = new HashSet<>();
        Coords coords = null;
        var piece = board.getPiece(location);
        for(int n = 0; n < 8; n++)
        {
            y = location.y();
            x = location.x();
            switch (n)
            {
                //left
                case 0:
                    x--;
                    if(x < 1) break;
                    coords = new Coords(x, y);
                    break;
                //right
                case 1:
                    x++;
                    if(x > 8) break;
                    coords = new Coords(x, y);
                    break;
                //up
                case 2:
                    y++;
                    if(y > 8) break;
                    coords = new Coords(x, y);
                    break;
                //down
                case 3:
                    y--;
                    if(y < 1) break;
                    coords = new Coords(x, y);
                    break;
                //upLeft
                case 4:
                    x--;
                    y++;
                    if(x < 1 || y > 8) break;
                    coords = new Coords(x, y);
                    break;
                //upRight
                case 5:
                    x++;
                    y++;
                    if(x > 8 || y > 8) break;
                    coords = new Coords(x, y);
                    break;
                //downLeft
                case 6:
                    x--;
                    y--;
                    if(x < 1 || y < 1) break;
                    coords = new Coords(x, y);
                    break;
                //downRight
                case 7:
                    x++;
                    y--;
                    if(x > 8 || y < 1) break;
                    coords = new Coords(x, y);
                    break;

            }
            if (coords != null)
                if (!board.pieceOnField(coords) || isOppositePiece(board, piece.getColor(), coords))
                    availableMoves.add(coords);
        }
        for(Map.Entry<Rook, Coords> rook : getUnmovedRooks(board, piece.getColor()).entrySet())
        {
            boolean onField;
            if(rook.getValue().x() == 8)
            {
                onField = false;
                for(int n = 1; n < 3; n++)
                {
                    if(board.pieceOnField(new Coords(rook.getValue().x() - n, rook.getValue().y())))
                        onField = true;
                }
                if (!onField)
                    availableMoves.add(new Coords(7, rook.getValue().y()));
            }
            else if(rook.getValue().x() == 1)
            {
                onField = false;
                castlingLoop: for(int n = 1; n < 4; n++)
                {
                    if(board.pieceOnField(new Coords(rook.getValue().x() + n, rook.getValue().y())))
                        onField = true;
                }
                if (!onField)
                    availableMoves.add(new Coords(3, rook.getValue().y()));
            }
        }

        return availableMoves;
    }

    public static HashMap<Rook, Coords> getUnmovedRooks(Board board, Color color) throws Field.NoPieceAvailable
    {
        var unmovedRooks = new HashMap<Rook, Coords>();
        for(var pieceLoop : board.getUnmovedPieces(color).entrySet())
            if (pieceLoop.getKey() instanceof Rook)
                unmovedRooks.put((Rook) pieceLoop.getKey(), pieceLoop.getValue());
        return unmovedRooks;
    }

}